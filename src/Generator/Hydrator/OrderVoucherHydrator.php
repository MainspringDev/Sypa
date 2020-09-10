<?php

declare(strict_types=1);

namespace Sypa\Generator\Hydrator;

use Sypa\Model\Sale\OrderVoucher;

class OrderVoucherHydrator {
    const REQUIRED_DATA = [
        'order_voucher_id',
        'order_id',
        'voucher_id',
        'description',
        'code',
        'from_name',
        'from_email',
        'to_name',
        'to_email',
        'voucher_theme_id',
        'message',
        'amount'
    ];

    /**
     * @param array $data
     * @return OrderVoucher
     * @throws \Exception
     */
    public function hydrate(array $data): OrderVoucher {
        foreach (self::REQUIRED_DATA as $required_data) {
            if (array_key_exists($required_data, $data) === false) {
                throw new \InvalidArgumentException(sprintf(
                    "Unable to create OrderVoucher from data. Missing '%s'.",
                    $required_data
                ));
            }
        }

        list(
            'order_voucher_id' => $order_voucher_id,
            'order_id'         => $order_id,
            'voucher_id'       => $voucher_id,
            'description'      => $description,
            'code'             => $code,
            'from_name'        => $from_name,
            'from_email'       => $from_email,
            'to_name'          => $to_name,
            'to_email'         => $to_email,
            'voucher_theme_id' => $voucher_theme_id,
            'message'          => $message,
            'amount'           => $amount,

        ) = $data;

        return new OrderVoucher(
            $order_voucher_id,
            $order_id,
            $voucher_id,
            $description,
            $code,
            $from_name,
            $from_email,
            $to_name,
            $to_email,
            $voucher_theme_id,
            $message,
            $amount
        );
    }

    /**
     * @param OrderVoucher $orderVoucher
     * @return array<string, mixed>
     */
    public function extract(OrderVoucher $orderVoucher): array {
        return [
            'order_voucher_id' => $orderVoucher->getOrderVoucherId(),
            'order_id'         => $orderVoucher->getOrderId(),
            'voucher_id'       => $orderVoucher->getVoucherId(),
            'description'      => $orderVoucher->getDescription(),
            'code'             => $orderVoucher->getCode(),
            'from_name'        => $orderVoucher->getFromName(),
            'from_email'       => $orderVoucher->getFromEmail(),
            'to_name'          => $orderVoucher->getToName(),
            'to_email'         => $orderVoucher->getToEmail(),
            'voucher_theme_id' => $orderVoucher->getVoucherThemeId(),
            'message'          => $orderVoucher->getMessage(),
            'amount'           => $orderVoucher->getAmount(),

        ];
    }
}
