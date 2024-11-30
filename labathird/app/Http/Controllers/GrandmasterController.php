<?php

namespace App\Http\Controllers;

use App\Models\Grandmaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image; 


class GrandmasterController extends Controller
{
    // Показывает список всех гроссмейстеров
    public function index()
    {
        $grandmasters = Grandmaster::all(); // Или другой метод для получения данных
        return view('grandmasters.index', compact('grandmasters'));
    }

    // Отображает форму для создания нового гроссмейстера
    public function create()
    {
        return view('grandmasters.create');
    }

    // Показывает форму для редактирования существующего гроссмейстера
    public function edit($id)
    {
        $grandmaster = Grandmaster::findOrFail($id);
        return view('grandmasters.edit', compact('grandmaster'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'birth_date' => 'required|date',
            'max_rating' => 'required|integer|between:0,3000',
            'image' => 'nullable|image',
            'info' => 'nullable|string',
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = 'public/' . $fileName;

            // Сохраняем изображение обрезанным до 300x300
            $this->resizeImage($image->getPathname(), $filePath, 300, 300);

            // Преобразуем путь к виду '/storage/имя_файла'
            $path = str_replace('public', 'storage', $filePath);
        }

        Grandmaster::create([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'birth_date' => $request->input('birth_date'),
            'max_rating' => $request->input('max_rating'),
            'image_path' => $path,
            'info' => $request->input('info'),
        ]);

        return redirect()->route('grandmasters.index')->with('success', 'Grandmaster created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'country' => 'required|string',
            'birth_date' => 'required|date',
            'max_rating' => 'required|integer|between:0,3000',
            'image' => 'nullable|image',
            'info'=> 'nullable|string',
        ]);

        $grandmaster = Grandmaster::findOrFail($id);
        $path = $grandmaster->image_path;

        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно существует
            if ($grandmaster->image_path) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $grandmaster->image_path));
            }

            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $filePath = 'public/' . $fileName;

            // Сохраняем новое изображение обрезанным до 300x300
            $this->resizeImage($image->getPathname(), $filePath, 300, 300);

            $path = str_replace('public', 'storage', $filePath);
        }

        $grandmaster->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'birth_date' => $request->input('birth_date'),
            'max_rating' => $request->input('max_rating'),
            'image_path' => $path,
            'info' => $request->input('info'),
        ]);

        return redirect()->route('grandmasters.index')->with('success', 'Grandmaster updated successfully.');
    }

    // Показывает данные конкретного гроссмейстера
    public function show($id)
    {
        $grandmaster = Grandmaster::findOrFail($id);
        return view('grandmasters.show', compact('grandmaster'));
    }

    // Удаляет гроссмейстера
    public function destroy($id)
    {
        $grandmaster = Grandmaster::findOrFail($id);

        // Удаляем изображение, если оно существует
        if ($grandmaster->image_path) {
            Storage::disk('public')->delete($grandmaster->image_path);
        }

        $grandmaster->delete();

        return redirect()->route('grandmasters.index')->with('success', 'Grandmaster deleted successfully.');
    }

    private function resizeImage($sourcePath, $destinationPath, $width, $height)
    {
        // Определяем тип изображения
        [$sourceWidth, $sourceHeight, $imageType] = getimagesize($sourcePath);

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $sourceImage = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $sourceImage = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $sourceImage = imagecreatefromgif($sourcePath);
                break;
            default:
                throw new \Exception('Unsupported image type');
        }

        // Создаем пустое изображение с заданными размерами
        $resizedImage = imagecreatetruecolor($width, $height);

        // Обрезаем и изменяем размер
        imagecopyresampled(
            $resizedImage, $sourceImage,
            0, 0, 0, 0,
            $width, $height,
            $sourceWidth, $sourceHeight
        );

        // Сохраняем изображение в указанное место
        if (!is_dir(storage_path('app/public'))) {
            mkdir(storage_path('app/public'), 0755, true);
        }

        switch ($imageType) {
            case IMAGETYPE_JPEG:
                imagejpeg($resizedImage, storage_path('app/' . $destinationPath));
                break;
            case IMAGETYPE_PNG:
                imagepng($resizedImage, storage_path('app/' . $destinationPath));
                break;
            case IMAGETYPE_GIF:
                imagegif($resizedImage, storage_path('app/' . $destinationPath));
                break;
        }

        // Удаляем ресурсы
        imagedestroy($sourceImage);
        imagedestroy($resizedImage);
    }
}
