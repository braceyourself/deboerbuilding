<style>
:root {
@php
    //using echo's here to avoid auto-formatting problems
    collect(\App\Models\Setting::whereName('theme')->first()?->value)->each(function($theme, $color){
        if($colors = data_get($theme, 'colors')){
            echo "--{$color}: {$theme['seed']['hex']['value']};";
            collect($colors)->reverse()->values()->pluck('hex.value')->mapWithKeys(fn($d, $k) => [($k + 1) * 100 => $d])->each(function($hex, $shade) use ($color){
                if($shade > 900){
                    $shade = 950;
                }
                echo "--{$color}-{$shade}: {$hex};";
            });
        }
    })
@endphp
}
</style>
