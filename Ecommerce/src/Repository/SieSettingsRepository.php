<?php
	
	namespace App\Repository;
	
	use App\Entity\SiteSettings;
	use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
	use Doctrine\Persistence\ManagerRegistry;
	
	class SiteSettingsRepository extends ServiceEntityRepository
	{
		public function __construct(ManagerRegistry $registry)
		{
			parent::__construct($registry, SiteSettings::class);
		}
		
		public function save(SiteSettings $entity, bool $flush = false): void
		{
			$this->getEntityManager()->persist($entity);
			
			if ($flush) {
				$this->getEntityManager()->flush();
			}
		}
		
		public function remove(SiteSettings $entity, bool $flush = false): void
		{
			$this->getEntityManager()->remove($entity);
			
			if ($flush) {
				$this->getEntityManager()->flush();
			}
		}
		
		public function findLatest(): ?SiteSettings
		{
			return $this->createQueryBuilder('ss')
			            ->orderBy('ss.updatedAt', 'DESC')
			            ->setMaxResults(1)
			            ->getQuery()
			            ->getOneOrNullResult();
		}
	}
