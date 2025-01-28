<?php

namespace App\Filament\Utilities;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Actions;;

final class ComponentGlobalConfiguration
{
    public static function configure(): void
    {
        /**
         * Configure global settings for Filament table edit action.
         */
        Actions\EditAction::configureUsing(function (Actions\EditAction $editAction) {
            return $editAction
                ->icon(__('icon.actions.edit'))
                ->label('')
                ->tooltip(__('action.edit.tooltip'));
        });

        /**
         * Configure global settings for Filament table view action.
         */
        Actions\ViewAction::configureUsing(function (Actions\ViewAction $viewAction) {
            return $viewAction
                ->icon(__('icon.actions.view'))
                ->label('')
                ->tooltip(__('action.view.tooltip'));
        });

        /**
         * Configure global settings for Filament view action.
         */
        ViewAction::configureUsing(function (ViewAction $viewAction) {
            return $viewAction
                ->icon(__('icon.actions.view'))
                ->label(__('action.view.label'))
                ->tooltip(__('action.view.tooltip'));
        });

        /**
         * Configure global settings for Filament create action.
         */
        CreateAction::configureUsing(function (CreateAction $createAction) {
            return $createAction
                ->createAnother(false)
                ->icon(__('icon.actions.create'))
                ->label(__('action.create.label'))
                ->tooltip(__('action.create.tooltip'));
        });

        /**
         * Configure global settings for Filament edit action.
         */
        EditAction::configureUsing(function (EditAction $editAction) {
            return $editAction
                ->icon(__('icon.actions.edit'))
                ->label(__('action.edit.label'))
                ->tooltip(__('action.edit.tooltip'));
        });

        /**
         * Configure global settings for Filament delete action.
         */
        DeleteAction::configureUsing(function (DeleteAction $deleteAction) {
            return $deleteAction
                ->icon(__('icon.actions.delete'))
                ->label(__('action.delete.label'))
                ->tooltip(__('action.delete.tooltip'));
        });
    }
}
