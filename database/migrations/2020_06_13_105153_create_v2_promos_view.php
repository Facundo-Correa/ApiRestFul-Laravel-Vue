<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateV2PromosView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW v2_PromoVista AS 
            select  `p`.`id` AS `id`,
                    `p`.`id_tipo_entidad` AS `id_tipo_entidad`,
                    `p`.`id_tipo_promo` AS `id_tipo_promo`,
                    `p`.`id_tipo_criterio` AS `id_tipo_criterio`,
                    `p`.`desde` AS `desde`,
                    `p`.`hasta` AS `hasta`,
                    `p`.`nombre` AS `nombre`,
                    `p`.`descripcion` AS `descripcion`,
                    `p`.`codigo` AS `codigo`,
                    `p`.`imagen` AS `imagen`,
                    `p`.`porcentaje` AS `porcentaje`,
                    `p`.`descuento_gral` AS `descuento_gral`,
                    `p`.`comparador_gral` AS `comparador_gral`,
                    `pp`.`id_producto` AS `producto`,
                    `ppr`.`id_entidad` AS `regalo`,
                    `pm`.`id_entidad` AS `marca`,
                    `pmo`.`id_entidad` AS `modelo`,
                    `ppa`.`id_entidad` AS `parte`,
                    `po`.`id_entidad` AS `origen`,
                    `ppe`.`id_entidad` AS `proveedor`,
                    `ppr`.`cantidad` AS `cantidad_regalo`,
                    concat_ws(',',`p`.`comparador_gral`,`pp`.`cantidad`,`pm`.`cantidad`,`pmo`.`cantidad`,`ppa`.`cantidad`,`po`.`cantidad`,`ppe`.`cantidad`) AS `cant_producto`,
                    `cdd`.`id_entidad` AS `diasemana`,
                    `cs`.`id_entidad` AS `semana`,
                    `cm`.`id_entidad` AS `mes`,
                    `cu`.`id_entidad` AS `usuario`,
                    `ctu`.`id_entidad` AS `tipo_usuario`,
                    `p`.`ultima_compra` AS `ultima_compra`,
                    `p`.`puntos` AS `puntos`,
                    concat_ws(',',`pp`.`descuento`,`ppr`.`descuento`,`pm`.`descuento`,`pmo`.`descuento`,`ppa`.`descuento`,`po`.`descuento`,`ppe`.`descuento`) AS `descuento`,
                    concat_ws(',',`pp`.`descuento_porcentaje`,`ppr`.`descuento_porcentaje`,`pm`.`descuento_porcentaje`,`pmo`.`descuento_porcentaje`,`ppa`.`descuento_porcentaje`,`po`.`descuento_porcentaje`,`ppe`.`descuento_porcentaje`) AS `descuento_porcentaje` 
                    
                    from (
                            (
                                (
                                    (
                                        (
                                            (
                                                (
                                                    (
                                                        (
                                                            (
                                                                (
                                                                    (`v2_promos` `p` left join `v2_promo_producto` `pp` on(
                                                                        (`p`.`id` = `pp`.`id_promo`)
                                                                    )
                                                                ) left join `v2_promo_producto_regalo` `ppr` on(
                                                                    (`p`.`id` = `ppr`.`id_promo`)
                                                                )
                                                            ) left join `v2_promo_marca` `pm` on(
                                                                (`p`.`id` = `pm`.`id_promo`)
                                                            )
                                                        ) left join `v2_promo_modelo` `pmo` on(
                                                            (`p`.`id` = `pmo`.`id_promo`)
                                                        )
                                                    ) left join `v2_promo_parte` `ppa` on(
                                                        (`p`.`id` = `ppa`.`id_promo`)
                                                    )
                                                ) left join `v2_promo_origen` `po` on(
                                                    (`p`.`id` = `po`.`id_promo`)
                                                )
                                            ) left join `v2_promo_proveedor` `ppe` on(
                                                (`p`.`id` = `ppe`.`id_promo`)
                                            )
                                        ) left join `v2_promo_dia` `cdd` on(
                                            (`p`.`id` = `cdd`.`id_promo`)
                                        )
                                    ) left join `v2_promo_semana` `cs` on(
                                        (`p`.`id` = `cs`.`id_promo`)
                                    )
                                ) left join `v2_promo_mes` `cm` on(
                                    (`p`.`id` = `cm`.`id_promo`)
                                )
                            ) left join `v2_promo_usuario` `cu` on(
                                (`p`.`id` = `cu`.`id_promo`)
                            )
                        ) left join `v2_promo_tipo_usuario` `ctu` on(
                            (`p`.`id` = `ctu`.`id_promo`)
                        )
                    )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v2_PromoVista");
    }
}
