<?php

namespace Modules\Settings\Repositories\Core\Eloquent;

use Modules\Settings\Models\Setting;
use Modules\Settings\Repositories\Contracts\SettingRepositoryInterface;
use Modules\Settings\Repositories\Core\BaseEloquentRepository;

class EloquentSettingRepository extends BaseEloquentRepository implements SettingRepositoryInterface
{
    public function entity()
    {
        return Setting::class;
    }

    public function store(array $data)
    {
        $exists = $this->entity()::exists();

        $modelData = [
                "facebook" => $data['facebook'],
                "twitter" => $data['twitter'],
                "instagram" => $data['instagram'],
                "youtube" => $data['youtube'],
                "linkedin" => $data['linkedin'],
                "pinterest" => $data['pinterest'],
                "address" => $data['address'],
                "phone" => $data['phone'],
                "email" => $data['email'],
                "open_time" => $data['open_time'],
                "admin_mail" => $data['admin_mail'],
                "logo_top" => $data['logo_top'],
                "logo_footer" => $data['logo_footer'],
                "logo_description" => $data['logo_description'],
                "whatsapp" => $data['whatsapp'],
                "active_whatsapp" => $data['active_whatsapp']
            ];

        if ($exists) {
            $model = $this->entity::firstOrFail();
            $model->update($modelData);

            return response()->json(['message' => 'Configurações atualizadas com sucesso!', 'status' => 200]);
        } else {
            $model = new $this->entity();
            $model->fill($modelData);
            $model->save();

            return response()->json(['message' => 'Configuração criada com sucesso!', 'status' => 200]);
        }
    }

}
