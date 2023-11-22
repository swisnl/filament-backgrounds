<?php

namespace Swis\Filament\Backgrounds\Contracts;

use Swis\Filament\Backgrounds\Image;

interface ProvidesImages
{
    public function getImage(): Image;
}
