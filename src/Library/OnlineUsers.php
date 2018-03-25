<?php
namespace tusharthe\OnlineUsers\Library;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
trait OnlineUsers
{
    public function allOnline()
    {
        return $this->all()->filter->isOnline();
    }
    public function isOnline()
    {
         return Cache::has($this->getCacheKey());
    }

    public function setCache()
    {
        $min = config('OnlineUser.time');
        $expiresAt = now()->addMinutes($min);
        return Cache::put($this->getCacheKey(), $this->getCacheContent(), $expiresAt);
    }

    public function removeCache()
    {
        Cache::pull($this->getCacheKey());
    }
    public function getCacheKey()
    {
        return sprintf('%s-%s', "OnlineActiveUser", $this->id);
    }
}
