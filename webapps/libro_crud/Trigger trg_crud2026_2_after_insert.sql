-- Trigger para insertar registros en todas las tablas por cada estudiante nuevo agregado a la tabla principal. 2611.23
USE `estudiantes2026_2`;

DROP TRIGGER IF EXISTS `trg_crud2026_2_after_insert`;

DELIMITER $$

CREATE TRIGGER `trg_crud2026_2_after_insert`
AFTER INSERT ON `crud2026_2`
FOR EACH ROW
BEGIN
  INSERT INTO `p1_crud2026_2` (
    `id_estudiante`, `P1_ACTS_PRES`, `P1_ACTS_DE_TOTALES`, `P1_ACTS_PROM`, `P1_ACTS_PUNTOS`,
    `P1_ACTS_NOTAS`, `P1_DISC_INICIALES`, `P1_DISC_XTRA`, `P1_DISC_MENOS`, `P1_DISC_XCMB`,
    `P1_DISC_RETRASOS`, `P1_DISC_PUNTOS`, `P1_DISC_NOTAS`, `P1_PROYEXA_CAL`, `P1_PROYEXA_PUNTOS`,
    `P1_PROYEXA_NOTAS`, `P1_CALREAL`, `P1_CALSAEVA`
  ) VALUES (
    NEW.`id`, 0, 0, 0.00, 0.00,
    '', 2, 0.00, 0.00, 0,
    0, 0.00, '', 0.00, 0.00,
    '', 0.00, 0
  );

  INSERT INTO `p2_crud2026_2` (
    `id_estudiante`, `P2_ACTS_PRES`, `P2_ACTS_DE_TOTALES`, `P2_ACTS_PROM`, `P2_ACTS_PUNTOS`,
    `P2_ACTS_NOTAS`, `P2_DISC_INICIALES`, `P2_DISC_XTRA`, `P2_DISC_MENOS`, `P2_DISC_XCMB`,
    `P2_DISC_RETRASOS`, `P2_DISC_PUNTOS`, `P2_DISC_NOTAS`, `P2_PROYEXA_CAL`, `P2_PROYEXA_PUNTOS`,
    `P2_PROYEXA_NOTAS`, `P2_CALREAL`, `P2_CALSAEVA`
  ) VALUES (
    NEW.`id`, 0, 0, 0.00, 0.00,
    '', 2, 0.00, 0.00, 0,
    0, 0.00, '', 0.00, 0.00,
    '', 0.00, 0
  );

  INSERT INTO `p3_crud2026_2` (
    `id_estudiante`, `P3_ACTS_PRES`, `P3_ACTS_DE_TOTALES`, `P3_ACTS_PROM`, `P3_ACTS_PUNTOS`,
    `P3_ACTS_NOTAS`, `P3_DISC_INICIALES`, `P3_DISC_XTRA`, `P3_DISC_MENOS`, `P3_DISC_XCMB`,
    `P3_DISC_RETRASOS`, `P3_DISC_PUNTOS`, `P3_DISC_NOTAS`, `P3_PROYEXA_CAL`, `P3_PROYEXA_PUNTOS`,
    `P3_PROYEXA_NOTAS`, `P3_CALREAL`, `P3_CALSAEVA`
  ) VALUES (
    NEW.`id`, 0, 0, 0.00, 0.00,
    '', 2, 0.00, 0.00, 0,
    0, 0.00, '', 0.00, 0.00,
    '', 0.00, 0
  );

  INSERT INTO `dep_crud2026_2` (
    `id_estudiante`, `DEPARTAMENTAL_PUNTOS_XTRA`, `DEPARTAMENTAL_CAL_PROYEXA`,
    `DEPARTAMENTAL_CAL_REAL`, `DEPARTAMENTAL_CAL_SAEVA`, `DEPARTAMENTAL_NOTAS`,
    `CAL_FINAL_ESTIMADA`
  ) VALUES (
    NEW.`id`, 0.00, 0.00,
    0.00, 0, '',
    0.00
  );
END$$

DELIMITER ;