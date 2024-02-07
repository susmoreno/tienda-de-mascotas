-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 02:53:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_id`
--

CREATE TABLE `categoria_id` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_id`
--

INSERT INTO `categoria_id` (`id`, `nombre_categoria`, `imagen`) VALUES
(1, 'ropa', 'categoria/ropa.jpg'),
(2, 'accesorios', 'categoria/accesorios.jpg'),
(3, 'camitas', 'categoria/camitas.jpg'),
(4, 'alimentos', 'categoria/alimentos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_id`
--

CREATE TABLE `marca_id` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `creador` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca_id`
--

INSERT INTO `marca_id` (`id`, `nombre`, `descripcion`, `creador`, `imagen`) VALUES
(1, 'Bark', 'Bark es una reconocida marca de ropa para mascotas que se caracteriza por su estilo moderno y funcionalidad. Sus diseños están inspirados en las tendencias de la moda urbana, ofreciendo una amplia gama de prendas que van desde abrigos elegantes hasta camisetas cómodas y accesorios a juego. Bark se distingue por la alta calidad de sus materiales y la atención al detalle en la confección de cada prenda, asegurando así la comodidad y el estilo de las mascotas que visten sus productos.', 'El dueño de la marca Bark es una empresa independiente de diseño de moda para mascotas llamada \"Paws & Co.\", fundada por Emily Rodriguez, una amante de los animales y apasionada por la moda. Emily estableció la marca con el objetivo de proporcionar a las m', 'marcas/bark.webp'),
(2, 'Paws Couture', 'Paws Couture es una exclusiva marca de alta costura para mascotas que se centra en crear piezas únicas y lujosas. Sus diseños están confeccionados con los materiales más finos y detalles elaborados a mano, lo que les confiere un toque de elegancia y sofisticación. Paws Couture ofrece desde trajes de gala hasta accesorios a juego, todo diseñado para hacer que las mascotas se sientan como auténticos miembros de la alta sociedad.', 'Paws Couture es propiedad de la reconocida diseñadora de moda animal, Isabella Montoya. Con una larga trayectoria en el mundo de la moda, Isabella decidió combinar su pasión por el diseño con su amor por los animales, creando así una marca de ropa para mas', 'marcas/paws_couture.webp'),
(3, 'Purina', 'Purina es una marca líder en la industria de alimentos para mascotas, reconocida por su compromiso con la nutrición de alta calidad para perros y gatos. Ofrece una amplia gama de productos, desde alimentos secos y húmedos hasta golosinas y suplementos, diseñados para satisfacer las necesidades específicas de cada mascota. Purina se destaca por su enfoque en la investigación y desarrollo de fórmulas nutricionales que promuevan la salud y el bienestar de los animales de compañía.', 'Purina es una marca propiedad de Nestlé S.A., una de las mayores empresas de alimentos y bebidas a nivel mundial. Nestlé adquirió la compañía Ralston Purina en 2002, consolidando así su posición en el mercado de alimentos para mascotas.', 'marcas/purina.webp'),
(4, 'Royal Canin', 'Royal Canin es una marca líder en la industria de alimentos especializados para perros y gatos. Se centra en proporcionar soluciones nutricionales específicas para mascotas con necesidades de salud particulares, como razas específicas, tamaños, edades y condiciones médicas. Los productos de Royal Canin están respaldados por investigaciones científicas y están diseñados para promover la salud y el bienestar óptimos de los animales.', 'Royal Canin es propiedad de Mars, Incorporated, una empresa multinacional que opera en diversas áreas, incluyendo alimentos para mascotas, alimentos y confitería. Mars adquirió Royal Canin en 2002 y ha continuado desarrollando y expandiendo la marca a nive', 'marcas/royal_canin.webp'),
(5, 'Paws Elegance', 'Paws Elegance es una distinguida marca de accesorios para mascotas que se destaca por su enfoque en la combinación de estilo y funcionalidad. Ofrece una amplia gama de accesorios, desde collares y correas hasta comederos y juguetes, todos diseñados con materiales de alta calidad y detalles meticulosos. Paws Elegance se esfuerza por brindar a las mascotas y a sus dueños opciones elegantes que complementen su estilo de vida.', 'Paws Elegance es propiedad de la empresa \"Pet Luxuries Inc.\", una compañía especializada en la creación de productos de lujo para mascotas. El fundador y propietario de Pet Luxuries Inc. es Michael Harrington, un empresario apasionado por los animales y co', 'marcas/paws_elegance.webp'),
(6, 'Furry Chic', 'Furry Chic es una marca de accesorios para mascotas que se caracteriza por su estilo contemporáneo y diseño innovador. Ofrece una amplia variedad de accesorios que van desde camas lujosas y transportadoras elegantes hasta juguetes interactivos y productos de cuidado personal. Furry Chic se destaca por su compromiso con la comodidad y seguridad de las mascotas, así como por su estética moderna y atractiva.', 'Furry Chic es propiedad de una empresa familiar dirigida por los hermanos Laura y Daniel Martinez. Ambos comparten una profunda pasión por los animales y un interés en la moda y el diseño. Fundaron Furry Chic con la visión de proporcionar a las mascotas y ', 'marcas/furry_chic.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `descripcion` text NOT NULL,
  `material` varchar(256) NOT NULL,
  `talle` varchar(256) NOT NULL,
  `fecha` date NOT NULL,
  `color` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `especial` enum('marvel','') NOT NULL,
  `precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='categoría ROPA';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `marca_id`, `nombre`, `descripcion`, `material`, `talle`, `fecha`, `color`, `imagen`, `especial`, `precio`) VALUES
(1, 2, 5, 'Cerdito', 'Este cerdito de juguete es perfecto para mantener a tu perro entretenido y activo. Hecho de caucho natural, es seguro y resistente para horas de diversión.', 'Caucho natural', 'Mediano', '2023-09-24', 'Gris', 'juego/cerdito.png', '', 5000.00),
(2, 2, 5, 'Pretal', 'La comodidad es primordial durante los paseos, y este pretal ajustable ofrece un ajuste perfecto sin rozaduras ni molestias. ¡Pasea a tu perro con estilo!', 'Nylon', 'Pretal Ajustable', '2023-09-01', 'Amarillo y Azul', 'juego/correa.png', '', 12000.00),
(3, 2, 6, 'Rascador', 'Este rascador cuenta con una superficie forrada en felpa y postes recubiertos en sisal natural, proporcionando materiales de alta calidad para que tu gato afile sus uñas y juegue.', 'Madera', 'Mediano', '2023-09-23', 'Beige', 'juego/rascador.png', '', 20000.00),
(4, 2, 6, 'Rueda', 'Mantén a tu gato activo y en forma con esta rueda de ejercicio. La comodidad es primordial, y las correas suaves evitan rozaduras o molestias durante el entrenamiento.', 'Plástico resistente', 'Mediano', '2023-08-02', 'Beige', 'juego/rueda.png', '', 80000.00),
(5, 2, 5, 'Tunel', 'Este túnel de juego ofrece un espacio divertido para esconderse y jugar. Su comodidad es primordial, con correas suaves que evitan rozaduras.', 'Nylon', 'Mediano', '2023-05-14', 'Negro', 'juego/tunel.png', '', 10000.00),
(6, 2, 6, 'Collar', 'Este collar especial de Marvel es perfecto para perros medianos. Ofrece comodidad y estilo, y su diseño está inspirado en los superhéroes de Marvel.', 'Nylon con detalles decorativos', 'Mediano', '2023-09-21', 'Negro', 'juego/collar.png', 'marvel', 7000.00),
(7, 2, 6, 'Stitch', 'Este peluche es ideal para que tu perro lo tire y juegue. La comodidad es primordial, y la cabeza del Stitch suaves evitan rozaduras o molestias durante el juego.', 'Tela suave y relleno de algodón', 'Mediano', '2023-06-18', 'Azul', 'juego/peluche.png', '', 4000.00),
(8, 2, 5, 'Comedero', 'Este comedero especial de Marvel es perfecto para tu mascota. Ofrece comodidad y estilo, y su diseño está inspirado en los superhéroes de Marvel.', 'Plástico resistente', 'Grande', '2023-09-23', 'Negro', 'juego/marvel.png', 'marvel', 6000.00),
(9, 2, 5, 'Pelota', 'Esta pelota es ideal para jugar a buscar y traer con tu perro. La comodidad es primordial, y las correas suaves evitan rozaduras o molestias durante el juego.', 'Caucho resistente', 'Mediano', '2023-07-03', 'Rojo', 'juego/pelota.png', '', 2000.00),
(10, 4, 3, 'Pro Plan gatitos kitten', 'Este alimento premium para gatos está formulado con ingredientes de alta calidad para proporcionar una nutrición óptima. Contiene proteínas, vitaminas y minerales esenciales para mantener a tu gato saludable y activo.', 'Carne de pollo, harina de subproductos de pollo, gluten de maíz, arroz, maíz, aceite de pollo y/o grasa vacuna preservados con tocoferoles (fuente de vitamina E), gluten de trigo, hidrolizado a base de subproductos de pollo y/o cerdo, harina de pescado y/o', 'Kitten', '2023-11-13', 'Marrón', 'alimentos/purina_gatitos.png', '', 18600.00),
(11, 4, 4, 'Pro Plan perros Puppy', 'Las croquetas nivel premium están hechas de carne para satisfacer las necesidades nutricionales de perros adultos. Contienen una mezcla equilibrada de proteínas, grasas y nutrientes para mantener a tu mascota en óptimas condiciones de salud y energía.', 'Carne de pollo congelada, harina de subproductos de pollo, gluten de maíz, maíz, trigo, aceite de pollo y/o grasa vacuna preservados con tocoferoles (fuente de vitamina E), hidrolizado a base de subproductos de pollo y/o cerdo, arroz, huevo en polvo, cloru', 'Puppy', '2023-12-07', 'Marrón', 'alimentos/purina_perros_medianos.png', '', 30600.00),
(12, 4, 3, 'Pro Plan gato Adulto', 'Nuestro pienso natural de pollo es una opción deliciosa y nutritiva para gatos adultos. Está elaborado con ingredientes de alta calidad, incluyendo carne de pollo real, sin aditivos ni conservantes artificiales. Proporciona a tu gato los nutrientes esenciales para mantenerlo activo y saludable.', 'Carne de pollo, maíz, harina de subproductos de pollo, gluten de maíz, trigo, aceite de pollo y/o grasa vacuna preservados con tocoferoles (fuente de vitamina E), hidrolizado a base de subproductos de pollo y/o cerdo, inulina, sal, harina de pescado y/o ha', 'Gato adulto', '2023-11-09', 'Marrón', 'alimentos/purina_gato_adultos.png', '', 19600.00),
(13, 4, 4, 'Royal Canin gato light', 'Este alimento seco de alta calidad está elaborado con una mezcla de carne de pavo y pescado, proporcionando una fuente rica en proteínas y ácidos grasos omega-3. Diseñado para gatos adultos, este alimento apoya la salud y vitalidad de tu felino.', 'Proteínas de ave deshidratadas, fibras vegetales, aislado de proteínas vegetales*, maíz, hidrolizado de proteínas animales, gluten de maíz, harina de maíz, arroz, trigo, grasas animales, minerales, pulpa de remolacha, levadura y sus partes, aceite de pesca', 'Gatos Medianos', '2023-10-03', 'Marrón', 'alimentos/royalcanin_gato_light.png', '', 30600.00),
(14, 4, 3, 'Pro Plan gatos castrados', 'Este pienso sin cereales es una opción nutritiva y fácil de digerir para gatos adultos. Está formulado con ingredientes de alta calidad y sin granos, ideal para gatos con sensibilidades alimentarias o estómagos sensibles.', 'Harina de subproductos de pollo, arroz, carne de salmón, harina de soja, gluten de maíz, fibra de soja, gluten de trigo, harina de pescado y/o harina de alga (Schizochytrium sp.), aceite de pollo y/o grasa vacuna preservados con tocoferoles (fuente de vita', 'Gatos Castrados', '2023-10-03', 'Marrón', 'alimentos/purina_gato_castrados.png', '', 30200.00),
(15, 4, 4, 'Royal Canin digestivo', 'Esta comida para gatos está formulada para satisfacer las necesidades de  crecimiento. Contiene una mezcla equilibrada de carne tierna y nutrientes esenciales para apoyar el desarrollo saludable de tu pequeño felino.', 'Arroz, harina de subproductos de pollo, grasas animales (vacuna y/o pollo),maíz, hidrolizado de hígado de pollo y/o vacuno y/o cerdo, levadura de cerveza, huevo en polvo, salesminerales, aceite de soja, celulosa purificada, aceite de pescado, zeolita, cásc', 'Gatos - Adultos mayores', '2023-10-10', 'Marrón', 'alimentos/royalcanini_digestivo_gato.png', '', 11440.00),
(16, 4, 4, 'Royal Canin Perro', 'Están diseñadas para perros adultos de razas grandes. Contienen una combinación equilibrada de proteínas, vitaminas y minerales esenciales para mantener la salud y la vitalidad de tu compañero peludo de gran tamaño.', 'pollo deshidratado (38%) arroz (12%), grasas animales, harina de trigo durum; sorgo, hidrolizado de pollo, cítricos siciliano secos (naranja, limón, 2% 1%); harina de pescado, linaza, pulpa de remolacha deshidratada, algarrobo seco, polvo de suero de leche', 'Perro mini', '2023-11-01', 'Marrón', 'alimentos/royalcanin_perro_adulto.png', '', 21000.00),
(17, 4, 3, 'Pro Plan Perro activo', 'Este alimento de pavo son ideales para aumentar la actividad de tu perro. Elaborados con pavo real, proporcionan una fuente de proteína magra y son perfectos para entrenamientos y actividades físicas. ¡Una forma deliciosa de motivar a tu mascota!', 'Cordero de alta calidad (20%) (incluido pulmones e hígado), Proteína de ave deshidratada, Arroz, Harina de soja, Grasas animales, Pulpa de remolacha deshidratada (5,5%), Harina de proteínas de maíz, Harinillas de maíz, Maíz, Huevo deshidratado, Sustancias ', 'Perros Medianos', '2023-11-14', 'Marrón', 'alimentos/purina_activemind_perro.png', '', 13250.00),
(18, 4, 4, 'Royal Canin Perro', 'Este pienso premium está elaborado con carne de cordero de alta calidad, proporcionando una fuente de proteínas magras y ácidos grasos omega-3. Es una opción nutritiva y deliciosa para perros adultos, contribuyendo a mantener su salud y energía.', 'Arroz, hidrolizado de extracto proteico de soja, aceite de pollo, grasa vacuna, sales minerales, hidrolizado de hígado de pollo y/o cerdo y/o vacuno, pulpa de remolacha, aceite de soja, zeolita, aceite de pescado, fructo-oligosacáridos (FOS), vitaminas, ti', 'Perro Maxi - mayores de 5 años.', '2023-11-14', 'Marrón', 'alimentos/royalcanin_maxiadulto_perro.png', '', 42600.00),
(19, 3, 2, 'Cama Cubierta', 'Con esta cama le das a tu peludo amigo un lugar acogedor para descansar con nuestra Cama Cubierta Gris. Su diseño resistente y duradero garantiza que tu mascota siempre tenga un refugio cómodo y seguro.', 'Poliéster', 'S', '2023-09-22', 'Gris', 'camas/camita-gris.png', '', 14520.00),
(20, 3, 6, 'Cama Cipres', 'Diseñada pensando en la relajación y el bienestar de tu mascota, esta cama ofrece un acolchado mullido para un descanso confortable.', 'Microfibra', 'M', '2023-09-16', 'Gris con rosa', 'camas/camita-rosa.png', '', 15000.00),
(21, 3, 6, 'Puff Nórdico', 'Se adapta a la forma del cuerpo de tu mascota, aliviando la tensión en las articulaciones y los músculos. Brinda un descanso óptimo.', 'Espuma', 'S', '2023-07-23', 'Beige', 'camas/camita-lunares.png', '', 12200.00),
(22, 3, 2, 'Cama América', 'Deja que tu mascota se relaje y duerma plácidamente en nuestra cama de mascotas ultra cómoda. Su relleno de alta calidad y tejidos suaves aseguran que tu amigo peludo tenga dulces sueños.', 'Poliéster', 'L', '2023-07-13', 'Azul', 'camas/cama-marvel.png', 'marvel', 20000.00),
(23, 3, 1, 'Hamburguesa', 'Sabemos lo importante que es mantener limpio el espacio de tu mascota. Nuestra cama de mascotas es fácil de desmontar y lavar, lo que facilita su mantenimiento y garantiza un ambiente saludable para tu amigo peludo.', 'Espuma', 'S', '2023-08-24', 'Marrón', 'camas/burger.png', '', 20200.00),
(24, 3, 6, 'Cama spider', 'Nuestra cama de mascotas cuenta con una base antideslizante que garantiza que permanezca en su lugar, incluso durante las actividades más juguetonas. La seguridad de tu mascota es nuestra prioridad.', 'Espuma', 'M', '2023-07-14', 'Rojo', 'camas/spider-cama.png', 'marvel', 11000.00),
(25, 3, 1, 'Cama Doble', 'Estamos seguros de que tanto tú como tu mascota amarán nuestra cama. Ofrecemos una garantía de satisfacción para que puedas comprar con confianza, sabiendo que estás invirtiendo en la felicidad y comodidad de tu fiel amigo.', 'Espuma', 'L', '2023-06-24', 'Gris', 'camas/doble.png', '', 30000.00),
(26, 3, 5, 'Princesa', 'Esta cama no solo brinda comodidad insuperable, sino que también agrega un toque de estilo a tu hogar. Su diseño elegante complementa cualquier decoración y se convierte en una pieza destacada en tu espacio.', 'Espuma', 'M', '2023-09-01', 'Rosa', 'camas/princesa.png', '', 18600.00),
(27, 3, 6, 'Perrito', 'Ofrecemos una variedad de tamaños y estilos para adaptarse a las necesidades específicas de tu mascota. Desde camas pequeñas y acogedoras para gatos hasta camas extragrandes para perros grandes, tenemos la cama perfecta para cada mascota.', 'Espuma', 'L', '2023-07-12', 'Marrón', 'camas/pelu.png', '', 10100.00),
(28, 1, 1, 'Traje', 'Un traje elegante que incluye una camisa y un moño, con una terminación que simula unos pantalones. Perfecto para darle un toque sofisticado a tu mascota.', 'Algodón', 'M', '2023-09-21', 'Negro', 'ropa/traje.png', '', 4000.00),
(29, 1, 1, 'Vestido', 'Este vestido ha sido diseñado pensando en la comodidad y la elegancia de tu mascota. Su color rosa le dará un aspecto adorable y encantador.', 'Satén', 'S', '2023-08-21', 'Rosa', 'ropa/vestidito.png', '', 3000.00),
(30, 1, 2, 'Dinosaurio', 'Un saquito abrigador con gorro y piel en el interior para disfrazar a tu mascota como un tierno dinosaurio. Mantén a tu compañero peludo cálido y divertido.', 'Algodón con forro de peluche', 'M', '2023-08-18', 'Verde', 'ropa/dino.png', '', 7000.00),
(31, 1, 2, 'Dracula', 'Convierte a tu mascota en el conde Drácula con este saquito abrigador con gorro y piel en el interior. Un disfraz perfecto para ocasiones especiales.', 'Felpa', 'M', '2023-08-22', 'Verde', 'ropa/dracula.png', '', 4000.00),
(32, 1, 2, 'Spiderman', '¡Tu mascota puede ser un auténtico superhéroe con este saquito abrigador con gorro y piel en el interior inspirado en Spiderman! ¡Que empiece la aventura!', 'Lycra', 'M', '2023-09-22', 'Azul y Rojo.', 'ropa/spider.png', 'marvel', 6000.00),
(33, 1, 1, 'Capitán', 'Este saquito abrigador con gorro y piel en el interior está diseñado para los fans del Capitán América. ¡Tu mascota lucirá genial con este atuendo de superhéroe!', 'Lycra', 'S', '2023-08-18', 'Azul', 'ropa/capitan.png', 'marvel', 6000.00),
(34, 1, 1, 'Principe', 'Haz que tu perro se sienta como un auténtico príncipe con este saquito abrigador con gorro y piel en el interior. Ideal para mantenerlo cálido y con estilo.', 'Algodón', 'S', '2023-05-17', 'Verde', 'ropa/principe.png', '', 7000.00),
(35, 1, 1, 'Ciervito', 'Este saquito abrigador con gorro y piel en el interior transformará a tu mascota en un tierno ciervito. Perfecto para días fríos y sesiones de fotos adorables.', 'Algodón con forro de peluche', 'S', '2023-08-06', 'Marrón', 'ropa/ciervito.png', '', 5000.00),
(36, 1, 2, 'Toy Story', 'Disfraza a tu mascota como un personaje de Toy Story con este saquito abrigador con gorro y piel en el interior. ¡Un toque de diversión y aventura para tu compañero peludo!', 'Poliéster', 'S', '2023-05-19', 'Amarillo', 'ropa/toy.png', '', 8000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_id`
--

CREATE TABLE `tipo_id` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` enum('perros','gatos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_id`
--

INSERT INTO `tipo_id` (`id`, `tipo`) VALUES
(1, 'perros'),
(2, 'gatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_x_productos`
--

CREATE TABLE `tipo_x_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_productos` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_x_productos`
--

INSERT INTO `tipo_x_productos` (`id`, `id_productos`, `tipo_id`) VALUES
(1, 19, 1),
(2, 19, 2),
(3, 20, 1),
(4, 20, 2),
(5, 21, 1),
(6, 21, 2),
(7, 22, 1),
(8, 23, 1),
(9, 23, 2),
(10, 24, 1),
(11, 24, 2),
(12, 25, 1),
(13, 25, 2),
(14, 26, 1),
(15, 26, 2),
(16, 27, 1),
(17, 27, 2),
(21, 1, 1),
(22, 2, 1),
(23, 3, 2),
(24, 4, 2),
(25, 5, 2),
(26, 6, 1),
(27, 7, 1),
(28, 8, 1),
(29, 9, 1),
(30, 10, 2),
(31, 11, 1),
(32, 12, 2),
(33, 13, 2),
(34, 14, 2),
(35, 15, 1),
(36, 16, 1),
(37, 17, 1),
(38, 18, 1),
(57, 28, 1),
(58, 28, 2),
(59, 29, 1),
(60, 29, 2),
(61, 30, 1),
(62, 30, 2),
(63, 31, 1),
(64, 31, 2),
(65, 32, 1),
(66, 32, 2),
(67, 33, 1),
(68, 33, 2),
(69, 34, 1),
(70, 34, 2),
(71, 35, 2),
(72, 35, 1),
(73, 36, 2),
(74, 36, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'sus.alejandror@gmail.com', 'jmoreno', 'Jesús Alejandro Moreno Ravelo', '$2y$10$Xsc.k.fIS3uKXH3sIreRfOCHu4otVjf9tLlXtR627Qqh53KaLNzvO', 'superadmin'),
(2, 'carolina.cacciagiu@gmail.com', 'ccacciagiu', 'Carolina Cacciagiu', '$2y$10$Xsc.k.fIS3uKXH3sIreRfOCHu4otVjf9tLlXtR627Qqh53KaLNzvO', 'usuario'),
(3, 'carolina.cacciagiu@davinci.edu.ar', 'carolina.cacciagiu', 'Carolina Cacciagiu', '$2y$10$Xsc.k.fIS3uKXH3sIreRfOCHu4otVjf9tLlXtR627Qqh53KaLNzvO', 'admin'),
(4, 'jesus.amoreno@davinci.edu.ar', 'jesus.moreno', 'Jesús Moreno', '$2y$10$Xsc.k.fIS3uKXH3sIreRfOCHu4otVjf9tLlXtR627Qqh53KaLNzvO', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_id`
--
ALTER TABLE `categoria_id`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca_id`
--
ALTER TABLE `marca_id`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `tipo_id`
--
ALTER TABLE `tipo_id`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_x_productos`
--
ALTER TABLE `tipo_x_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camitas` (`id_productos`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_id`
--
ALTER TABLE `categoria_id`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marca_id`
--
ALTER TABLE `marca_id`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `tipo_id`
--
ALTER TABLE `tipo_id`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_x_productos`
--
ALTER TABLE `tipo_x_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_id` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marca_id` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_x_productos`
--
ALTER TABLE `tipo_x_productos`
  ADD CONSTRAINT `tipo_x_productos_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_id` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_x_productos_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
