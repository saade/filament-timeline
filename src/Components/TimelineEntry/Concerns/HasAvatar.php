<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Closure;
use Saade\FilamentTimeline\Enums\Size;

trait HasAvatar
{
    protected Size | string | Closure | null $avatarSize = null;

    protected string | Closure | null $avatar = null;

    public function avatar(string | Closure $avatar = null): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function avatarSize(Size | string | Closure | null $size): static
    {
        $this->avatarSize = $size;

        return $this;
    }

    public function getAvatar(): ?string
    {
        $avatar = $this->avatar;

        if (is_string($avatar)) {
            return $avatar;
        }

        return $this->evaluate($avatar);
    }

    public function getAvatarSize(): Size | string | null
    {
        return $this->evaluate($this->avatarSize);
    }
}
