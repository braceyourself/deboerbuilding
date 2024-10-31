<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $position
 * @property string $blurb
 * @property string $image
 * @property string|null $image_properties
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereBlurb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereImageProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $content
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
 */
	class Feedback extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $mediable_type
 * @property int $mediable_id
 * @property int $media_id
 * @property int $order
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Media $media
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereMediableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereMediableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItem whereUpdatedAt($value)
 */
	class MediaItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $page
 * @property string $slug
 * @property int $markdown
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereMarkdown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageContent whereUpdatedAt($value)
 */
	class PageContent extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static enabled()
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $short_description
 * @property int $enabled
 * @property int $show_in_footer
 * @property string|null $footer_text
 * @property int|null $image_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $featured
 * @property-read \Awcodes\Curator\Models\Media|null $image
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MediaItem> $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Service inFooter()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereFooterText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereShowInFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $taggable_type
 * @property int $taggable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTaggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTaggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $client_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $order
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent implements \Spatie\EloquentSortable\Sortable {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $hashed_email
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

