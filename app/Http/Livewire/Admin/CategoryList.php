<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;

class CategoryList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Category::query();
    }

    protected function getTableColumns(): array
    {

        return [
            TextColumn::make('name')->label('NAME')->searchable(),
            TextColumn::make('year')->label('YEAR')->searchable(),
            BadgeColumn::make('is_default')->label('STATUS')
                ->enum([
                    0 => '',
                    1 => 'Default',
                ])->colors([
                        'success' => 1
                    ])->icon(
                    'heroicon-o-cog'
                ),


        ];

    }

    protected function getTableHeaderActions(): array
    {

        return [
            Action::make('newCategory')->button()->icon('heroicon-o-plus')->action(
                function ($data) {
                    Category::create([
                        'name' => $data['name'],
                        'year' => $data['year'],
                        'is_default' => $data['is_default'],
                    ]);
                }
            )->form(function () {
                return [
                    TextInput::make('name')->required(),
                    TextInput::make('year')->required()->numeric()->unique(),
                    Toggle::make('is_default'),
                ];
            })->modalWidth('xl')
        ];

    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')->color('success')->label('Set as Default')->button()->action(
                function ($record) {
                    Category::where('is_default', 1)->first()->update([
                        'is_default' => false,
                    ]);

                    $record->update([
                        'is_default' => true,
                    ]);
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.category-list');
    }
}
