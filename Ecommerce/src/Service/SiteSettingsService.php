<?php
	
	namespace App\Service;
	
	use App\Entity\SiteSettings;
	use App\Repository\SiteSettingsRepository;
	use Symfony\Contracts\Cache\CacheInterface;
	use Symfony\Contracts\Cache\ItemInterface;
	
	class SiteSettingsService
	{
		private $settings;
		
		public function __construct(
			private SiteSettingsRepository $repository,
			private CacheInterface $cache
		) {}
		
		public function getSettings(): SiteSettings
		{
			if (!$this->settings) {
				$this->settings = $this->cache->get('site_settings', function (ItemInterface $item) {
					$item->expiresAfter(3600); // Cache for 1 hour
					return $this->repository->findLatest() ?? new SiteSettings();
				});
			}
			
			return $this->settings;
		}
		
		public function clearCache(): void
		{
			$this->cache->delete('site_settings');
			$this->settings = null;
		}
	}
