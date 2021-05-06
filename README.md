<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Crud usando Laravel 


- ✨Bootstrap✨
- ✨Laravel✨
- ✨PHP✨
- ✨JavaScript✨

## Instalação:

- Crie um banco de dados mysql com o nome "laravel"
- Copie copie o arquivo .env-example e crie um novo arquivo chamado .env 
- no terminal digite: composer install
- npm install
- php artisan migrate
- php artisan serve

 O site deve estar rodando em "localhost:8000"


## Preenchimento do Banco:

- Pra poupar tempo nos testes

 //Código SQL:



 INSERT INTO `alunos` (`id`, `nome`, `email`, `cpf`, `created_at`, `updated_at`) VALUES
(1, 'dadsa', 'dasdas', 'dasda', '2021-05-05 22:59:33', '2021-05-05 22:59:33'),
(2, 'Pedro', 'pedro@email.com', '00033322298', '2021-05-05 23:41:20', '2021-05-05 23:41:20'),
(3, 'Paulo', 'paulo@email.com', '00022277798', '2021-05-05 23:41:47', '2021-05-05 23:41:47'),
(4, 'Murillo', 'murillo@email.com', '33399944439', '2021-05-05 23:42:09', '2021-05-05 23:42:09'),
(5, 'Alan', 'alan@email.com', '22200033303', '2021-05-05 23:48:13', '2021-05-05 23:48:13'),
(6, 'Debora', 'debora@email.com', '33322211123', '2021-05-05 23:49:10', '2021-05-05 23:49:10'),
(7, 'Guilherme', 'guilherme@email.com', '44433344454', '2021-05-06 00:10:49', '2021-05-06 00:10:49'),
(8, 'Arthur', 'arthur@email.com', '44400033300', '2021-05-06 00:12:55', '2021-05-06 00:12:55'),
(9, 'Jefferson', 'jefferson@email.com', '33388877711', '2021-05-06 00:13:23', '2021-05-06 00:13:23'),
(10, 'Ronaldo', 'ronaldo@email.com', '33377709903', '2021-05-06 00:13:53', '2021-05-06 00:13:53'),
(11, 'Thiago', 'thiago@email.com', '22233311109', '2021-05-06 00:14:25', '2021-05-06 00:14:25'),
(12, 'Bob', 'bob@email.com', '22233311133', '2021-05-06 00:15:00', '2021-05-06 00:15:00'),
(13, 'João', 'joao@email.com', '00033322292', '2021-05-06 03:41:28', '2021-05-06 03:41:28');

INSERT INTO `alunos_cursos` (`idAluno`, `idCurso`, `turno`, `idBolsa`, `dataInicio`, `dataTermino`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, '2021-05-05 22:59:57', '2021-05-05 22:59:57'),
(6, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:03:52', '2021-05-06 00:03:52'),
(1, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:05:33', '2021-05-06 00:05:33'),
(4, 3, NULL, NULL, NULL, NULL, '2021-05-06 00:10:00', '2021-05-06 00:10:00'),
(4, 3, NULL, NULL, NULL, NULL, '2021-05-06 00:10:55', '2021-05-06 00:10:55'),
(7, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:11:31', '2021-05-06 00:11:31'),
(3, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:12:07', '2021-05-06 00:12:07'),
(2, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:12:27', '2021-05-06 00:12:27'),
(8, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:13:07', '2021-05-06 00:13:07'),
(9, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:13:33', '2021-05-06 00:13:33'),
(10, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:14:09', '2021-05-06 00:14:09'),
(11, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:14:36', '2021-05-06 00:14:36'),
(12, 2, NULL, NULL, NULL, NULL, '2021-05-06 00:15:11', '2021-05-06 00:15:11'),
(12, 2, NULL, NULL, NULL, NULL, '2021-05-06 01:21:22', '2021-05-06 01:21:22'),
(12, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:28:36', '2021-05-06 02:28:36'),
(11, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:28:56', '2021-05-06 02:28:56'),
(10, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:30:01', '2021-05-06 02:30:01'),
(9, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:30:15', '2021-05-06 02:30:15'),
(9, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:30:29', '2021-05-06 02:30:29'),
(8, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:30:44', '2021-05-06 02:30:44'),
(7, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:31:02', '2021-05-06 02:31:02'),
(6, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:31:14', '2021-05-06 02:31:14'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:31:28', '2021-05-06 02:31:28'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:31:39', '2021-05-06 02:31:39'),
(4, 4, NULL, NULL, NULL, NULL, '2021-05-06 02:31:50', '2021-05-06 02:31:50'),
(6, 3, NULL, NULL, NULL, NULL, '2021-05-06 02:59:06', '2021-05-06 02:59:06'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:05:04', '2021-05-06 03:05:04'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:06:01', '2021-05-06 03:06:01'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:06:25', '2021-05-06 03:06:25'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:08:19', '2021-05-06 03:08:19'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:08:21', '2021-05-06 03:08:21'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:08:23', '2021-05-06 03:08:23'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:08:47', '2021-05-06 03:08:47'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:08:49', '2021-05-06 03:08:49'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:09:29', '2021-05-06 03:09:29'),
(5, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:10:31', '2021-05-06 03:10:31'),
(1, 4, NULL, NULL, NULL, NULL, '2021-05-06 03:43:48', '2021-05-06 03:43:48');

INSERT INTO `cursos` (`id`, `nome`, `imagem`, `conteudo`, `created_at`, `updated_at`) VALUES
(2, 'Portugues', 'port.jpg', 'Leitura, Gramática, Poesia', '2021-05-05 23:37:59', '2021-05-05 23:37:59'),
(3, 'Matemática', 'matematica.jpg', 'Calculo, Geometria', '2021-05-05 23:38:12', '2021-05-05 23:38:12'),
(4, 'Filosofia', 'filosofia.jpg', 'Poesia, Estudo ao ar livre e Leitura', '2021-05-06 01:21:16', '2021-05-06 01:21:16'),
(5, 'Frances', 'franca,jpg', 'Lingua', '2021-05-06 03:42:00', '2021-05-06 03:42:00');

