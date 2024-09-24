import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import app from '../../../../tailwind.config.js'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './app/Filament/Resources/**/*.php',
        './app/Filament/Resources/**/Pages/*.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/vendor/filament-kanban/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
    ],
    theme:  app.theme
}
