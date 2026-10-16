<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class TeamRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'tournament_id' => 'required|exists:tournaments,id',
            'name' => 'required|string|max:60',
            'tag'  => 'required|string|max:5',
            'city' => 'nullable|string|max:60',
            'wins' => 'required|integer|min:0',
        ];
    }
}
