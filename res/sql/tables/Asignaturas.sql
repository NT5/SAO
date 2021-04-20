CREATE TABLE IF NOT EXISTS `Asignaturas` (
 `Id_Asignatura` INT NOT NULL AUTO_INCREMENT,
 `Nombre` VARCHAR(350) NOT NULL,
 `Cod_Interno` VARCHAR(350) NOT NULL,
 `CreateAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 UNIQUE KEY(`Cod_Interno`),
 PRIMARY KEY (`Id_Asignatura`)
);

INSERT INTO `asignaturas` VALUES (1, 'Español Básico', 'AE01', '2021-04-19 19:34:40');
INSERT INTO `asignaturas` VALUES (2, 'Matemática Introductoria', 'AE02', '2021-04-19 19:35:07');
INSERT INTO `asignaturas` VALUES (3, 'Teoría de la Administración', 'AE03', '2021-04-19 19:35:30');
INSERT INTO `asignaturas` VALUES (4, 'Contabilidad General', 'AE04', '2021-04-19 19:38:41');
INSERT INTO `asignaturas` VALUES (5, 'Filosofía', 'AE05', '2021-04-19 19:38:54');
INSERT INTO `asignaturas` VALUES (6, 'Optativa', 'AE06', '2021-04-19 19:39:10');
INSERT INTO `asignaturas` VALUES (7, 'Derecho Administrativo Empresarial', 'AE07', '2021-04-19 19:39:29');
INSERT INTO `asignaturas` VALUES (8, 'Matemática I', 'AE08', '2021-04-19 19:39:47');
INSERT INTO `asignaturas` VALUES (9, 'Reflexión Teológica', 'AE09', '2021-04-19 19:40:01');
INSERT INTO `asignaturas` VALUES (10, 'Fundamentos de Mercado', 'AE10', '2021-04-19 19:40:13');
INSERT INTO `asignaturas` VALUES (11, 'Estadística General', 'AE11', '2021-04-19 19:40:24');
INSERT INTO `asignaturas` VALUES (12, 'Redacción Técnica', 'AE12', '2021-04-19 19:40:35');
INSERT INTO `asignaturas` VALUES (13, 'Contabilidad de Costos I', 'AE13', '2021-04-19 19:40:49');
INSERT INTO `asignaturas` VALUES (14, 'Estadística Inferencial', 'AE14', '2021-04-19 19:41:08');
INSERT INTO `asignaturas` VALUES (15, 'Métodos y Técnicas de Investigación', 'AE15', '2021-04-19 19:41:20');
INSERT INTO `asignaturas` VALUES (16, 'Contabilidad de Costos II', 'AE16', '2021-04-19 19:41:38');
INSERT INTO `asignaturas` VALUES (17, 'Matemática II', 'AE17', '2021-04-19 19:41:52');
INSERT INTO `asignaturas` VALUES (18, 'Geografía e Historia Económica de Nicaragua', 'AE18', '2021-04-19 19:42:11');
INSERT INTO `asignaturas` VALUES (19, 'Ética profesional y Responsabilidad Social Empresarial', 'AE19', '2021-04-19 19:42:22');
INSERT INTO `asignaturas` VALUES (20, 'Finanzas I', 'AE20', '2021-04-19 19:42:39');
INSERT INTO `asignaturas` VALUES (21, 'Comportamiento Organizacional', 'AE21', '2021-04-19 19:42:50');
INSERT INTO `asignaturas` VALUES (22, 'Investigación de Mercado', 'AE22', '2021-04-19 19:44:05');
INSERT INTO `asignaturas` VALUES (23, 'Finanzas II', 'AE23', '2021-04-19 19:44:22');
INSERT INTO `asignaturas` VALUES (24, 'Práctica de Familiarización', 'AE24', '2021-04-19 19:44:36');
INSERT INTO `asignaturas` VALUES (25, 'Gestión Empresarial', 'AE25', '2021-04-19 19:45:36');
INSERT INTO `asignaturas` VALUES (26, 'Microeconomía', 'AE26', '2021-04-19 19:45:48');
INSERT INTO `asignaturas` VALUES (27, 'Informática Aplicada a los Negocios', 'AE27', '2021-04-19 19:46:03');
INSERT INTO `asignaturas` VALUES (28, 'Planificación Estratégica Empresarial', 'AE28', '2021-04-19 19:46:17');
INSERT INTO `asignaturas` VALUES (29, 'Finanzas Corporativas', 'AE29', '2021-04-19 19:46:30');
INSERT INTO `asignaturas` VALUES (30, 'Matemática Financiera', 'AE30', '2021-04-19 19:46:42');
INSERT INTO `asignaturas` VALUES (31, 'Organización y Sistemas', 'AE31', '2021-04-19 19:46:53');
INSERT INTO `asignaturas` VALUES (32, 'Macroeconomía', 'AE32', '2021-04-19 19:47:06');
INSERT INTO `asignaturas` VALUES (33, 'Medio Ambiente y Ecología', 'AE33', '2021-04-19 19:47:20');
INSERT INTO `asignaturas` VALUES (34, 'Gestión y Desarrollo del Talento Humano', 'AE34', '2021-04-19 19:47:33');
INSERT INTO `asignaturas` VALUES (35, 'Gerencia de Mercadeo', 'AE35', '2021-04-19 19:47:44');
INSERT INTO `asignaturas` VALUES (36, 'PYMEs', 'AE36', '2021-04-19 19:47:57');
INSERT INTO `asignaturas` VALUES (37, 'Investigación de Operaciones I', 'AE37', '2021-04-19 19:48:10');
INSERT INTO `asignaturas` VALUES (38, 'Producción I', 'AE38', '2021-04-19 19:48:23');
INSERT INTO `asignaturas` VALUES (39, 'Seminario de Investigación', 'AE39', '2021-04-19 19:48:34');
INSERT INTO `asignaturas` VALUES (40, 'Investigación de Operaciones II', 'AE40', '2021-04-19 19:48:51');
INSERT INTO `asignaturas` VALUES (41, 'Producción II', 'AE41', '2021-04-19 19:49:03');
INSERT INTO `asignaturas` VALUES (42, 'Negocios Internacionales y Comercio Exterior', 'AE42', '2021-04-19 19:49:17');
INSERT INTO `asignaturas` VALUES (43, 'Formulación y Evaluación de Proyectos', 'AE43', '2021-04-19 19:49:29');
INSERT INTO `asignaturas` VALUES (44, 'Auditoría General', 'AE44', '2021-04-19 19:49:39');
INSERT INTO `asignaturas` VALUES (45, 'Políticas Públicas', 'AE45', '2021-04-19 19:49:51');
INSERT INTO `asignaturas` VALUES (46, 'Dirección Estratégica Empresarial', 'AE46', '2021-04-19 19:50:01');
INSERT INTO `asignaturas` VALUES (47, 'Emprendimiento e Innovación ', 'AE47', '2021-04-19 19:50:16');
INSERT INTO `asignaturas` VALUES (48, 'Práctica de Profesionalización', 'AE48', '2021-04-19 19:50:27');
