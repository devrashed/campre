<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


if (!function_exists('makeImage')) {
    function makeImage($data, string $name, string $path)
    {
        $dir = public_path() . '/uploads/' . $path;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        $image = str_replace('data:image/png;base64,', '', $data);
        $image = str_replace(' ', '+', $image);
        // $imagename = $name . uniqueId(10);
        $imagename = $name.uniqueId(10).'.'.'png';
        $imagepath = public_path('uploads/' . $path . '/') . $imagename;
        Image::make(base64_decode($image))->resize(200, 200)->save($imagepath);
        return 'uploads/' . $path . '/' . $imagename;
    }
}
if (!function_exists('saveImage')) {
    function saveImage(Request $request, string $name, string $path)
    {
        if ($request->hasFile('image')) {
            $image  = $request->file('image');
            $imageNew  = $name . uniqueId(50) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $image->storeAs($path, $imageNew);
                return 'uploads/' . $path . '/' . $imageNew;
            }
        } else {
            return 'uploads/avatar/avatar.png';
        }
    }
}

if (!function_exists('cropImage')) {
    function cropImage(Request $request, string $source, string $name, string $path, array $size)
    {
        if ($request->hasFile($source)) {
            $dir = public_path() . '/uploads/' . $path;
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $img = Image::make($request->file($source));
            // $img->resize(358, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $img->resizeCanvas(358, 358);
            $img->fit($size[0], $size[1]);

            $imageNew  = $name . uniqueId(32).'.' .$request->file($source)->getClientOriginalExtension();

            $img->save(public_path() . '/uploads/' . $path . '/' . $imageNew);
            return 'uploads/' . $path . '/' . $imageNew;
        } else {
            return 'uploads/avatar/avatar.png';
        }
    }
}

if (!function_exists('makeWebp')) {
    function makeWebp(Request $request, string $source, string $name, string $path, int $quality = 70)
    {
        //print_r($request);

        if ($request->hasFile($source)) {
            $dir = public_path() . '/uploads/' . $path;
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            $imageResize = Image::make($request->file($source))->encode('webp', $quality);
            if ($imageResize->width() > 730) {
                $imageResize->resize(730, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $imageNew  = $name . uniqueId(32).'.webp';
            $imageResize->save(public_path() . '/uploads/' . $path . '/' . $imageNew);
            return 'uploads/' . $path . '/' . $imageNew;
        } else {
            return 'ds/images/banner.png';
        }
        
        
    }
}

if (!function_exists('logo')) {
    function logo()
    {
        if (setting('app_theme') && setting('app_theme') == 'light') {
            return setting('app_dark_logo');
        }
        return setting('app_light_logo');
    }
}

if (!function_exists('activeNav')) {
    function activeNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' active ' : '';
        }
        return request()->routeIs($route) ? ' active ' : '';
    }
}
if (!function_exists('openNav')) {
    function openNav(array $routes)
    {
        $rt = '';
        foreach ($routes as $route) {
            $rt .= request()->routeIs($route) || '';
        }
        return $rt ? ' show ' : '';
    }
}
if (!function_exists('svgStar')) {
    function svgStar($fill = '4285f4')
    {
        return '<span class="pl-1"><img title="Ainjibi Verified Firm" alt="Ainjibi Verified Firm" style="height: 22px;vertical-align: middle; margin-bottom:2px;cursor:pointer;width: 22px;" src="' . asset('uploads/appLogo/verified.png') . '"></span>';
    }
}

if (!function_exists('userName')) {
    function userName($user)
    {
        if ($user->company_name) {
            if ($user->blue_badge) {
                return ucfirst($user->company_name) . ' ' . svgStar();
            }
            return ucfirst($user->company_name);
        }
        return ucfirst($user->fullname);
    }
}
if (!function_exists('makeBackEndDate')) {
    function makeBackEndDate($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date);
    }
}

if (!function_exists('makeFrontEndDate')) {
    function makeFrontEndDate($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date);
    }
}

if (!function_exists('panel')) {
    function panel($val)
    {
        return config('panel.' . $val);
    }
}

if (!function_exists('roleName')) {
    function roleName($roles)
    {
        $r = '';
        foreach ($roles->where('name', '!=', 'client') as $role) {
            $r .= '<span class="badge badge-info">' . ucfirst(explode('@uid', $role->name)[0]) . '</span>';
        }
        return $r;
    }
}
if (!function_exists('trimRoleAdmin')) {
    function trimRoleAdmin($roles)
    {
        return str_replace('-', ' ', $roles);
    }
}
if (!function_exists('trimRole')) {
    function trimRole($val)
    {
        return str_replace('-', ' ', explode('@uid', $val)[0]);
    }
}


if (!function_exists('userStatus')) {
    function userStatus($status)
    {
        switch ($status) {
            case 'active':
                return '<span class="badge badge-success">Active</span>';
                break;
            case 'pending':
                return '<span class="badge badge-warning">Pending</span>';
                break;
            case 'remove':
                return '<span class="badge" style="background-color: #fa5661;color:#fff;">Remove</span>';
                break;
            case 'mute':
                return '<span class="badge badge-info">Mute</span>';
                break;
            default:
                return '<span class="badge badge-danger">Suspend</span>';
                break;
        }
    }
}
if (!function_exists('selectStatus')) {
    function selectStatus($value = '')
    {
        return '
            <option value="active" ' . ($value == "active" ? "selected" : "") . '>Active</option>
            <option value="pending" ' . ($value == "pending" ? "selected" : "") . '>Pending</option>
            <option value="remove" ' . ($value == "remove" ? "selected" : "") . '>Remove</option>
            <option value="mute" ' . ($value == "mute" ? "selected" : "") . '>Mute</option>
            <option value="suspend" ' . ($value == "suspend" ? "selected" : "") . '>Suspend</option>';
    }
}

if (!function_exists('uniqueId')) {
    function uniqueId($lenght = 8)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
if (!function_exists('propic')) {
    function propic($user)
    {
        return $user->profile_picture ? asset($user->profile_picture) : asset('assist/images/avatar.png');
    }
}
if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('slug')) {
    function slug($slug)
    {
        return Str::slug($slug);
    }
}

if (!function_exists('word_limit')) {
    function word_limit(string $string, int $limit = 8)
    {
        return Str::words(strip_tags($string), $limit);
    }
}

if (!function_exists('userHasPrivilege')) {
    function userHasPrivilege(array $permission)
    {
        if (AuthorizationChecker::canDo($permission)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('bn_slug')) {
    function bn_slug($text)
    {
        $array = [':', ',', '.', '!', '|', '।', 'ঃ', '{', '}', '[', ']', '(', ')', '৳', '%', '$', '#', '@', '*', '+', ';'];
        $slug = strtolower(str_replace($array, '', trim($text)));
        return str_replace(' ', '-', $slug);
        return strtolower(preg_replace('/\s+/u', '-', trim($text)));
    }
}

if (!function_exists('niceNumber')) {
    function niceNumber($n)
    {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) {
            return $n;
        }

        // now filter it;
        if ($n >= 1000000000000) {
            return round(($n / 1000000000000), 1) . ' T';
        } elseif ($n >= 1000000000) {
            return round(($n / 1000000000), 1) . ' B';
        } elseif ($n >= 1000000) {
            return round(($n / 1000000), 1) . ' M';
        } elseif ($n >= 1000) {
            return round(($n / 1000), 1) . ' K';
        }

        return number_format($n);
    }
}

if (!function_exists('niceFileSize')) {
    function niceFileSize($bytes)
    {
        $result = '';
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}


if (!function_exists('seoTool')) {
    function seoTool($title = null, $description = null, $keywords = null, $ogimage = null)
    {
        SEOTools::setTitle($title??setting('slogan'));
        SEOTools::setDescription($description??setting('app_description'));
        SEOTools::setCanonical(url()->current());
        SEOTools::twitter()->setTitle(url()->current());
        SEOTools::twitter()->setSite('@bangali');
        SEOMeta::addKeyword($keywords??setting('app_keyword'));
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage($ogimage??setting('ogimage'));
        OpenGraph::setDescription($description??setting('app_description'));
        SEOTools::jsonLd()->addImage($ogimage??setting('ogimage'));
    }
}
if (!function_exists('get_cpu_uses')) {
    function get_cpu_uses()
    {
        $load = sys_getloadavg();
        return $load[0];
    }
}


if (!function_exists('get_memory_usage')) {
    function get_memory_usage()
    {
        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2]/$mem[1]*100;

        return $memory_usage;
    }
}
// Get Ads from DB

if (!function_exists('getAds')) {
    function getAds($page, $position, $source)
    {
        return optional(Advertisement::where('status', 1)
            ->where('page', $page)
            ->where('position', $position)
            ->where('source', $source)->first())->script;
    }
}



if (!function_exists('getRgb')) {
    function getRgb($hex)
    {
        return sscanf($hex, "#%02x%02x%02x");
    }
}



// POINT SYSTEM FUNCTIONS

if (!function_exists('badgeName')) {
    function badgeName($badge)
    {
        if ($badge->image) {
            return '<img src="'.asset($badge->image).'" alt="'.$badge->name.'" class="img-fluid img-responsive img">';
        }
        $a   = getRgb($badge->color);
        $rgb = "rgb(".$a[2].",".$a[1].",".$a[0].")";
        return '<span class="badge p-3 text-light" style="background: linear-gradient(90deg, '.$badge->color.', '.$rgb.')"><i class="fa '.$badge->icon.' pr-1"></i>'.$badge->name.'</span>';
    }
}
if (!function_exists('checkValue')) {
    function checkValue($array, $name)
    {
        return array_key_exists($name, $array)?$array[$name]:'';
    }
}

if (!function_exists('assignPoint')) {
    function assignPoint($user_id = null, $name = null, $action = null, $action_id = null)
    {
        $type     = explode('_', $name)[0];
        $start    = now()->format('Y-m-d').' 00:00:00';
        $end      = now()->format('Y-m-d').' 23:59:59';
        $user     = User::find($user_id);
        $level_id = $user->getDefaultLevel->level_id;

        $earnCredit = AuthorizationPermission::where('level_id', $level_id)
                ->where('module', 'like', 'credit%')
                ->pluck('value', 'name')->toArray();
        $todayTotal = PointTransaction::where('user_id', $user_id)
                ->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)->sum('point') ;
        $totalByName = PointTransaction::where('user_id', $user_id)
                ->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                ->where('point_of', $name)->sum('point');
        $chkPointName = PointTransaction::where('user_id', $user_id)
                ->where('point_of', 'like', "$type%")
                ->where('action_id', $action_id)->first();
        $assigns = PointSettings::where('name', 'like', "$type%")
                ->pluck('value', 'name')->toArray();

        if ($earnCredit['allow'] == 1 &&
        $earnCredit['limit'] > $todayTotal &&
        $totalByName < $assigns[$type.'_maxday'] &&
        !$chkPointName) {
            PointTransaction::create([
                'user_id'   => $user_id,
                'action'    => $action,
                'action_id' => $action_id,
                'point_of'  => $name,
                'point'     => $assigns[$name]
            ]);
        }
        $userTotalPoint = PointTransaction::where('user_id', $user_id)->sum('point');
        UserPoint::updateOrCreate([
            'user_id'   => $user_id,
        ], [
            'user_id' => $user_id,
            'point'   => $userTotalPoint,
        ]);
    }
}
