<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class CustomHelpers
{
    public static function getImgURL(object $Img)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        return url('/storage') . '/' . Storage::disk('public')->putFileAs('images', $Img, $ImgName);
    }

    public static function getWallpaperImgName(object $Img)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default wallpapers path "storage/app/public/wallpapers"
        |--------------------------------------------------------------------------
        */
        Storage::disk('public')->putFileAs('wallpapers', $Img, $ImgName);
        return $ImgName;
    }
    /**
     * @param string $Path e.g $Path = 'wallpapers/thumbnails/'
     */
    public static function saveCompressReturnImgName(object $Img, string $Path, string $Extention)
    {
        $ImgName = Carbon::now()->timestamp . "_" . str_replace(" ", "_", pathinfo($Img->getClientOriginalName(), PATHINFO_FILENAME));
        Storage::disk('public')->putFileAs($Path, $Img, $ImgName . '.' . $Img->getClientOriginalExtension());

        Image::load(storage_path('app/public/') . $Path . $ImgName . '.' . $Img->getClientOriginalExtension())
        ->optimize()
        ->quality(70)
        ->format(Manipulations::FORMAT_WEBP)
        ->save(storage_path('app/public/') . $Path . $ImgName . '.webp');
        
        return $ImgName . '.' . $Extention;
    }

    public static function getImgNameWithID(object $Img, int $ID, string $Side = null)
    {
        $ImgName = $ID . "_" . str_replace(" ", "_", $Img->getClientOriginalName());
        if (!is_null($Side)) $ImgName = $Side . '_' . $ImgName;
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        Storage::disk('public')->putFileAs('images', $Img, $ImgName);
        return $ImgName;
    }

    public static function getViewPathWithID(object $Svg, string $Type, int $ID, string $Side = null)
    {
        // Get the SVG content
        $SvgContent = $Svg->getContent();
        // Generate directory name
        $DirectoryPath = resource_path('views/' . $Type . '/' . $ID);
        // Create the directory if it doesn't exist
        File::makeDirectory($DirectoryPath, 0755, true, true);
        // Generate the blade file name
        $FileName = (is_null($Side)) ? $ID . '_' . $Type . '.blade.php' : $ID . '_' . $Side . '.blade.php';
        // Set the file path
        $FilePath = $DirectoryPath . '/' . $FileName;
        // Write the SVG content into the blade file
        File::put($FilePath, $SvgContent);
        // Returning the final path where the view file is generated
        return $ID . '/' . $ID . '_';
    }

    public static function saveImgAndGetName(object $Img)
    {
        $ImgName = str_replace(" ", "_", $Img->getClientOriginalName());
        /*
        |--------------------------------------------------------------------------
        | Save the image to the default storage path "storage/app/public/images"
        |--------------------------------------------------------------------------
        */
        Storage::disk('public')->putFileAs('images', $Img, $ImgName);
        return $ImgName;
    }

    public static function convertInto2IndexArray(string $String)
    {
        $Words = explode(' ', $String);
        // Get the last word of the string
        $LastWord = end($Words);
        // Remove the last word from the array
        $WordsWithoutLast = array_slice($Words, 0, -1);
        // Create the final array with the desired indexes
        $Array = [
            implode(' ', $WordsWithoutLast), // Index 0: All words except the last one
            $LastWord // Index 1: Last word
        ];
        return $Array;
    }

    public static function convertAddressIntoArray(string $Address)
    {
        // Split address into an array of words
        $Words = explode(' ', $Address);
        // Return the address as it is
        if (count($Words) <= 4)  return $Address;
        // Join the first 4 words into a string
        $Line1 = implode(' ', array_slice($Words, 0, 4));
        // Join the remaining words into a string 
        $Line2 = implode(' ', array_slice($Words, 4));
        return [$Line1, $Line2];
    }
    /**
     * @var $Characters total characters per line
     * @var $Lines total lines
     */
    public static function ConvertStringIntoLines(string $StringValue, int $Characters, int $Lines)
    {
        $LinesArray = [];
        $CurrentLine = '';
        $CharactersCount = 0;
        for ($i = 0; $i < strlen($StringValue); $i++) {
            $Character = $StringValue[$i];
            if ($CharactersCount < $Characters) {
                $CurrentLine .= $Character;
                $CharactersCount++;
            } else {
                if (count($LinesArray) < $Lines - 1) {
                    $LinesArray[] = $CurrentLine;
                    $CurrentLine = $Character;
                    $CharactersCount = 1;
                } else {
                    $CurrentLine = $Character;
                    $CharactersCount = 1;
                }
            }
        }
        if ($CurrentLine !== '') $LinesArray[] = $CurrentLine;
        return $LinesArray;
    }

    public static function getPaginationKeys(object $Paginator)
    {
        return [
            'currentPage' => $Paginator->currentPage(),
            'getOptions' => $Paginator->getOptions(),
            'hasMorePages' => $Paginator->hasMorePages(),
            'nextPageUrl' => $Paginator->nextPageUrl(),
            'previousPageUrl' => $Paginator->previousPageUrl(),
            'perPage' => $Paginator->perPage(),
            'total' => $Paginator->total(),
        ];
    }

    public static function getOnlyWallpapers(Collection $Images, string $CatName)
    {
        $Data = [];
        foreach ($Images as $SingleIndex) {
            if ($SingleIndex->type === 1) {
                array_push($Data, [
                    "id" => $SingleIndex->id,
                    "front_image" => $SingleIndex->front_image,
                    "type" => $SingleIndex->type,
                    "cat_id" => $SingleIndex->cat_id,
                    "cat_title" => $CatName,
                    "created_at" => $SingleIndex->created_at,
                    "updated_at" => $SingleIndex->updated_at,
                    "deleted_at" => $SingleIndex->deleted_at,
                ]);
            }
        }
        return $Data;
    }

    public static function getOnlyPreviews(Collection $Images, string $CatName)
    {
        $Data = [];
        foreach ($Images as $SingleIndex) {
            if ($SingleIndex->type === 2) {
                array_push($Data, [
                    "id" => $SingleIndex->id,
                    "front_image" => $SingleIndex->front_image,
                    "type" => $SingleIndex->type,
                    "cat_id" => $SingleIndex->cat_id,
                    "cat_title" => $CatName,
                    "created_at" => $SingleIndex->created_at,
                    "updated_at" => $SingleIndex->updated_at,
                    "deleted_at" => $SingleIndex->deleted_at,
                ]);
            }
        }
        return $Data;
    }
}
