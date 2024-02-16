<?php


namespace App\Http\Services;


use App\Models\File;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    public $media = [];

    public function upload($files, ?string $storeFolder)
    {
        try {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $name = $file->getClientOriginalName();

                $uploadDir = $file->store($storeFolder);
                $generatedFileName = str_replace("$storeFolder/", '', $uploadDir);

                $fileType = self::getContentType($extension);
                $uuid = Str::uuid();

                $media = File::create([
                    'user_id'           => Auth::user()->id,
                    'file_name'         => $name,
                    'real_path'         => $uploadDir,
                    'file_type'         => $fileType,
                    'file_size'         => filesize(base_path().Storage::url("app/$storeFolder/$generatedFileName")),
                    'year'              => Carbon::now()->year(),
                    'publication_date'  => $fileType,
                ]);

                $this->media[] = [
                    'id' => $media->id,
                    'uuid' => $uuid,
                ];
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getMedia(): array
    {
        return $this->media;
    }

    protected static function getContentType($extension)
    {
        $types = [
            'video'    => ['mkv', 'mp4', 'avi', 'mov', 'wmv'],
            'image'    => ['jpg', 'png', 'jpeg', 'gif'],
            'document' => ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'odt', 'txt', 'csv'],
            'favicon'  => ['ico'],
        ];

        foreach ($types as $type => $extensions) {
            if (in_array(strtolower($extension), $extensions)) {
                return $type;
            }
        }

        return 'undefined';
    }

    protected static function getUri($str, $replace = array(), $delimiter = '-')
    {
        $cyr = array(
            'а',
            'б',
            'в',
            'г',
            'д',
            'e',
            'ж',
            'з',
            'и',
            'й',
            'к',
            'л',
            'м',
            'н',
            'о',
            'п',
            'р',
            'с',
            'т',
            'у',
            'ф',
            'х',
            'ц',
            'ч',
            'ш',
            'щ',
            'ъ',
            'ь',
            'ю',
            'я',
            'А',
            'Б',
            'В',
            'Г',
            'Д',
            'Е',
            'Ж',
            'З',
            'И',
            'Й',
            'К',
            'Л',
            'М',
            'Н',
            'О',
            'П',
            'Р',
            'С',
            'Т',
            'У',
            'Ф',
            'Х',
            'Ц',
            'Ч',
            'Ш',
            'Щ',
            'Ъ',
            'Ь',
            'Ю',
            'Я',
        );
        $lat = array(
            'a',
            'b',
            'v',
            'g',
            'd',
            'e',
            'zh',
            'z',
            'i',
            'y',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'r',
            's',
            't',
            'u',
            'f',
            'h',
            'ts',
            'ch',
            'sh',
            'sht',
            'a',
            'y',
            'yu',
            'ya',
            'A',
            'B',
            'V',
            'G',
            'D',
            'E',
            'Zh',
            'Z',
            'I',
            'Y',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'R',
            'S',
            'T',
            'U',
            'F',
            'H',
            'Ts',
            'Ch',
            'Sh',
            'Sht',
            'A',
            'Y',
            'Yu',
            'Ya',
        );

        $str = str_replace($cyr, $lat, $str);

        setlocale(LC_ALL, 'en_US.UTF8');
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = preg_replace(
            array('/Ä/', '/Ö/', '/Ü/', '/ä/', '/ö/', '/ü/'),
            array('Ae', 'Oe', 'Ue', 'ae', 'oe', 'ue'),
            $str
        );
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $clean);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }
}
