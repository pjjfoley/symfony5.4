<?php

namespace App\Controller;

use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    const DAYS_BEFORE_START_DATE = 30;

    /**
     * @Route("/test_carbon_iso", name="test_carbon_iso")
     * @return JsonResponse
     */
    public function carbonISO(): JsonResponse
    {
        $defaultStartDate = Carbon::now()->subDays(self::DAYS_BEFORE_START_DATE)->firstOfMonth();
        $startDate = $defaultStartDate->isoFormat('DD-MM-YYYY');

        return $this->json([
            'start_date' => $startDate,
        ]);
    }
}