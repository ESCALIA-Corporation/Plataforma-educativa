CREATE DATABASE [AsesoriasAcademicas]
GO

DROP DATABASE AsesoriasAcademicas
GO

USE [AsesoriasAcademicas]
GO

/****** Object:  Table [dbo].[ALUMNO]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ALUMNO]
(
	[Matricula] [nchar](15) NOT NULL,
	[Nombre] [nchar](50) NULL,
	[ApellidoPaterno] [nchar](50) NULL,
	[ApellidoMaterno] [nchar](50) NULL,
	[Sexo] [nchar](15) NULL,
	[Semestre] [nchar](15) NULL,
	[Grupo] [nchar](15) NULL,
	[Fecha] [date] NULL,
	[IdPE] [int] NULL,
	CONSTRAINT [PK_ALUMNO] PRIMARY KEY CLUSTERED 
(
	[Matricula] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[ASESOR]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ASESOR]
(
	[IdAsesor] [int] NOT NULL,
	[Nombre] [nchar](50) NULL,
	[ApellidoPaterno] [nchar](50) NULL,
	[ApellidoMaterno] [nchar](50) NULL,
	[Sexo] [nchar](15) NULL,
	[Telefono] [nchar](20) NULL,
	[Email] [nchar](20) NULL,
	[IdUsuario] [int] NULL,
	[IdPE] [int] NULL,
	CONSTRAINT [PK_ASESOR] PRIMARY KEY CLUSTERED 
(
	[IdAsesor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[ASESORIA]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ASESORIA]
(
	[IdAsesoria] [int] NOT NULL,
	[Matricula] [nchar](15) NULL,
	[IdAsignatura] [nchar](15) NULL,
	[Tema] [nchar](100) NULL,
	[Horario] [nchar](100) NULL,
	[TotalHoras] [nchar](10) NULL,
	[FechaRegistro] [date] NOT NULL,
	[Estatus] [char](1) NULL,
	CONSTRAINT [PK_ASESORIA] PRIMARY KEY CLUSTERED 
(
	[IdAsesoria] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[ASIGNACION]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ASIGNACION]
(
	[IdAsignatura] [nchar](15) NOT NULL,
	[IdAsesor] [int] NOT NULL,
	[TipoAsesoria] [nchar](15) NULL,
	[FechaAsignacion] [date] NULL,
	[Lugar] [varchar](15) NULL,
	[HorasEstimadas] [int] NULL,
	[Horario] [nchar](15) NULL
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[ASIGNATURA]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ASIGNATURA]
(
	[IdAsignatura] [nchar](15) NOT NULL,
	[Nombre] [nchar](50) NULL,
	[Creditos] [int] NULL,
	[Semestre] [int] NULL,
	CONSTRAINT [PK_ASIGNATURA] PRIMARY KEY CLUSTERED 
(
	[IdAsignatura] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[PROGRAMA_EDUCATIVO]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[PROGRAMA_EDUCATIVO]
(
	[IdPE] [int] NOT NULL,
	[ClavePE] [nchar](15) NULL,
	[Nombre] [nchar](25) NULL,
	[Responsable] [nchar](15) NULL,
	[IdUsuario] [int] NOT NULL,
	CONSTRAINT [PK_PROGRAMA_EDUCATIVO] PRIMARY KEY CLUSTERED 
(
	[IdPE] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

/****** Object:  Table [dbo].[USUARIO]    Script Date: 15/11/2024 12:41:07 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[USUARIO]
(
	[IdUsuario] [int] NOT NULL,
	[Descripcion] [nchar](25) NULL,
	[Tipo] [nchar](15) NULL,
	[Usuario] [nchar](15) NULL,
	[Contrasena] [nchar](15) NULL,
	CONSTRAINT [PK_USUARIO] PRIMARY KEY CLUSTERED 
(
	[IdUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

--Relaciones de tablas
ALTER TABLE [dbo].[ALUMNO]  WITH CHECK ADD  CONSTRAINT [FK_PE_ALUMNO] FOREIGN KEY([IdPE])
REFERENCES [dbo].[PROGRAMA_EDUCATIVO] ([IdPE])
GO
ALTER TABLE [dbo].[ALUMNO] CHECK CONSTRAINT [FK_PE_ALUMNO]
GO
ALTER TABLE [dbo].[ASESOR]  WITH CHECK ADD  CONSTRAINT [FK_ASESOR_USUARIO] FOREIGN KEY([IdUsuario])
REFERENCES [dbo].[USUARIO] ([IdUsuario])
GO
ALTER TABLE [dbo].[ASESOR] CHECK CONSTRAINT [FK_ASESOR_USUARIO]
GO
ALTER TABLE [dbo].[ASESOR]  WITH CHECK ADD  CONSTRAINT [FK_PE_ASESOR] FOREIGN KEY([IdPE])
REFERENCES [dbo].[PROGRAMA_EDUCATIVO] ([IdPE])
GO
ALTER TABLE [dbo].[ASESOR] CHECK CONSTRAINT [FK_PE_ASESOR]
GO
ALTER TABLE [dbo].[ASESORIA]  WITH CHECK ADD  CONSTRAINT [FK_ALUMNO_ASESORIA] FOREIGN KEY([Matricula])
REFERENCES [dbo].[ALUMNO] ([Matricula])
GO
ALTER TABLE [dbo].[ASESORIA] CHECK CONSTRAINT [FK_ALUMNO_ASESORIA]
GO
ALTER TABLE [dbo].[ASESORIA]  WITH CHECK ADD  CONSTRAINT [FK_ASIGNATURA_ASESORIA] FOREIGN KEY([IdAsignatura])
REFERENCES [dbo].[ASIGNATURA] ([IdAsignatura])
GO
ALTER TABLE [dbo].[ASESORIA] CHECK CONSTRAINT [FK_ASIGNATURA_ASESORIA]
GO
ALTER TABLE [dbo].[ASIGNACION]  WITH CHECK ADD  CONSTRAINT [FK_ASIGNACION_ASESOR] FOREIGN KEY([IdAsesor])
REFERENCES [dbo].[ASESOR] ([IdAsesor])
GO
ALTER TABLE [dbo].[ASIGNACION] CHECK CONSTRAINT [FK_ASIGNACION_ASESOR]
GO
ALTER TABLE [dbo].[ASIGNACION]  WITH CHECK ADD  CONSTRAINT [FK_ASIGNACION_ASIGNATURA] FOREIGN KEY([IdAsignatura])
REFERENCES [dbo].[ASIGNATURA] ([IdAsignatura])
GO
ALTER TABLE [dbo].[ASIGNACION] CHECK CONSTRAINT [FK_ASIGNACION_ASIGNATURA]
GO
ALTER TABLE [dbo].[PROGRAMA_EDUCATIVO]  WITH CHECK ADD  CONSTRAINT [FK_PE_USUARIO] FOREIGN KEY([IdUsuario])
REFERENCES [dbo].[USUARIO] ([IdUsuario])
GO
ALTER TABLE [dbo].[PROGRAMA_EDUCATIVO] CHECK CONSTRAINT [FK_PE_USUARIO]
GO

/****** CREACION DE PROCEDIMIENTOS ALMACENADOS ******/

--INSERTAR ALUMNO

CREATE PROCEDURE SP_I_ALUMNO
    @Matricula nchar(15),
    @Nombre nchar(50),
    @ApellidoPaterno nchar(50),
    @ApellidoMaterno nchar(50),
    @Sexo nchar(15),
    @Semestre nchar(15),
    @Grupo nchar(15),
    @Fecha date,
    @IdPE int
AS
BEGIN
    INSERT INTO ALUMNO (Matricula, Nombre, ApellidoPaterno, ApellidoMaterno, Sexo, Semestre, Grupo, Fecha, IdPE)
    VALUES (@Matricula, @Nombre, @ApellidoPaterno, @ApellidoMaterno, @Sexo, @Semestre, @Grupo, @Fecha, @IdPE);
END;
GO
exec SP_I_ALUMNO 22011589, 'Daniela', 'Pardo', 'González', 'Femenino', '4', 'A', '2022-09-01', 1
exec SP_I_ALUMNO 22011514, 'Samuel', 'Cruz', 'Godinez', 'Masculino', '4', 'B', '2023-01-15', 1

select *
from ALUMNO GO

--ACTUALIZAR ALUMNO 
CREATE PROC SP_U_ALUMNO
	@Matricula nchar(15),
	@Nombre nchar(50),
	@ApellidoPaterno nchar(50),
	@ApellidoMaterno nchar(50),
	@Sexo nchar(15),
	@Semestre nchar(15),
	@Grupo nchar(15),
	@Fecha date,
	@IdPE int
AS
UPDATE ALUMNO 
	SET Matricula = @Matricula , Nombre = @Nombre ,ApellidoPaterno =
	@ApellidoPaterno , ApellidoMaterno = @ApellidoMaterno, Sexo = @Sexo, Semestre = @Semestre ,
	Grupo = @Grupo, Fecha = @Fecha
	WHERE @IdPE = @IdPE
GO
exec SP_U_ALUMNO 22011587, 'Daniela', 'Pardo', 'González', 'Femenino', '5', 'A', '2022-09-01', 1

select *
from ALUMNO go

--BORRAR PERFIL ALUMNO
CREATE PROC SP_D_ALUMNO
	@Matricula nchar(15),
	@Nombre nchar(50),
	@ApellidoPaterno nchar(50),
	@ApellidoMaterno nchar(50),
	@Sexo nchar(15),
	@Semestre nchar(15),
	@Grupo nchar(15),
	@Fecha date,
	@IdPE int,
	@Accion VARCHAR(15) OUTPUT
AS
IF (@Accion = 7)
    BEGIN
	DELETE FROM ALUMNO WHERE Matricula = @Matricula
	SET @Accion = 'Se borro el codigo: '
END
GO

--INSERTAR ASESOR
CREATE PROC SP_I_ASESOR
	@IdAsesor int,
	@Nombre nchar(50),
	@ApellidoPaterno nchar(50),
	@ApellidoMaterno nchar(50),
	@Sexo nchar(15),
	@Telefono nchar(20),
	@Email nchar(20),
	@IdUsuario int,
	@IdPE int
AS
INSERT INTO ASESOR
VALUES(@IdAsesor, @Nombre, @ApellidoPaterno, @ApellidoMaterno, @Sexo,
		@Telefono, @Email, @IdUsuario, @IdPE)
GO
exec SP_I_ASESOR 01, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1,1
exec SP_I_ASESOR 03, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1,1
exec SP_I_ASESOR 02, 'Pedro Jhoan', 'Salazar', 'Perez', 'Masculino', 7721730510, 'B@itsoeh.edu.mx', 1,1

select *
from ASESOR

--ACTUALIZAR ASESOR
CREATE PROC SP_U_ASESOR
	@IdAsesor int,
	@Nombre nchar(50),
	@ApellidoPaterno nchar(50),
	@ApellidoMaterno nchar(50),
	@Sexo nchar(15),
	@Telefono nchar(20),
	@Email nchar(20),
	@IdUsuario int,
	@IdPE int
AS
UPDATE ASESOR 
		SET  IdAsesor = @IdAsesor , Nombre = @Nombre ,ApellidoPaterno =
		@ApellidoPaterno ,ApellidoMaterno = @ApellidoMaterno ,Sexo = @Sexo,
		Telefono = @Telefono ,Email = @Email, IdUsuario = @IdUsuario
		WHERE IdPE = @IdPE
GO
exec SP_U_ASESOR 01, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1,1

select *
from ASESOR

-- BORRAR ASESOR--

CREATE PROC SP_D_ASESOR
	@IdAsesor int,
	@Nombre nchar(50),
	@ApellidoPaterno nchar(50),
	@ApellidoMaterno nchar(50),
	@Sexo nchar(15),
	@Telefono nchar(20),
	@Email nchar(20),
	@IdUsuario int,
	@IdPE int,
	@Accion VARCHAR(50) OUTPUT
AS
IF (@Accion = '1')
    BEGIN
	DELETE FROM ASESOR WHERE IdAsesor = @IdAsesor
	SET @Accion = 'Se borro el codigo: '
END
GO

--- INSERTAR ASESORIA--

CREATE PROC SP_I_ASESORIA
	@IdAsesoria int ,
	@Matricula nchar(15) ,
	@IdAsignatura nchar(15),
	@Tema nchar(100),
	@Horario nchar(100) ,
	@TotalHoras nchar(10),
	@FechaRegistro date,
	@Estatus char(1)
AS
INSERT INTO ASESORIA
VALUES(@IdAsesoria, @Matricula, @IdAsignatura, @Tema, @Horario, @TotalHoras, @FechaRegistro, @Estatus)
GO
exec SP_I_ASESORIA 03, '22011514','A', 'Tema 2 ', '11:00-12:00', 2, '2023-06-15', 'Completada'

Select *
from ASESORIA

--- ACTUALIZAR ASESORIA

ALTER PROC SP_U_ASESORIA
	@IdAsesoria int ,
	@Matricula nchar(15) ,
	@IdAsignatura nchar(15),
	@Tema nchar(100),
	@Horario nchar(100) ,
	@TotalHoras nchar(10),
	@FechaRegistro date,
	@Estatus char(1)
AS
UPDATE ASESORIA 
	SET  IdAsesoria = @IdAsesoria ,Matricula = @Matricula , IdAsignatura = @IdAsignatura ,Tema =
	@Tema , Horario = @Horario , TotalHoras = @TotalHoras ,FechaRegistro = @FechaRegistro , Estatus = @Estatus
	WHERE IdAsesoria = @IdAsesoria
GO
exec SP_U_ASESORIA 01, '22011514','A', 'Tema 2 ', '11:00-12:00',2, '2023-06-15', 'Completada'

select *
from ASESORIA

-- BORRAR AESORIA--

CREATE PROC SP_D_ASESORIA
	@IdAsesoria int ,
	@Matricula nchar(15) ,
	@IdAsignatura nchar(15),
	@Tema nchar(100),
	@Horario nchar(100) ,
	@TotalHoras nchar(10),
	@FechaRegistro date,
	@Estatus char(1) ,
	@Accion VARCHAR(50) OUTPUT
AS
IF (@Accion = '1')
    BEGIN
	DELETE FROM ASESORIA WHERE IdAsesoria = @IdAsesoria
	SET @Accion = 'Se borro el codigo: '
END
GO

--INSERTAR ASIGNACION--

CREATE PROC SP_I_ASIGNACION
	@IdAsignatura nchar(15),
	@IdAsesor int,
	@TipoAsesoria nchar(15),
	@FechaAsignacion date ,
	@Lugar varchar(15),
	@HorasEstimadas int,
	@Horario nchar(15)	
AS
INSERT INTO ASIGNACION
VALUES(@IdAsignatura, @IdAsesor, @TipoAsesoria, @FechaAsignacion, @Lugar,
		@HorasEstimadas, @Horario)
GO
exec SP_I_ASIGNACION 'A', 01, 'Individual', '2023-04-20', 'Cuvinculo', 2, '10:00-11:00'
exec SP_I_ASIGNACION 'B', 02, 'Individual', '2023-05-22', 'Cuvinculo', 2, '09:00-10:00'

select *
from ASIGNACION

--ACTUALIZAR ASIGNACION

CREATE PROC SP_U_ASIGNACION
	@IdAsignatura nchar(15),
	@IdAsesor int,
	@TipoAsesoria nchar(15),
	@FechaAsignacion date ,
	@Lugar varchar(15),
	@HorasEstimadas int,
	@Horario nchar(15)
AS
UPDATE ASIGNACION 
		SET  IdAsignatura = @IdAsignatura , IdAsesor = @IdAsesor ,TipoAsesoria =
		@TipoAsesoria ,FechaAsignacion  = @FechaAsignacion  ,Lugar = @Lugar ,
		HorasEstimadas = @HorasEstimadas 
		WHERE Horario = @Horario
GO
exec SP_U_ASIGNACION 'B', 01, 'Individual', '2023-04-20', 'Cuvinculo', 2, '10:00-11:00'

select *
from ASIGNACION

--BORRAR ASIGNACION--

CREATE PROC SP_D_ASIGNACION
	@IdAsignatura nchar(15),
	@IdAsesor int,
	@TipoAsesoria nchar(15),
	@FechaAsignacion date ,
	@Lugar varchar(15),
	@HorasEstimadas int,
	@Horario nchar(15),
	@Accion VARCHAR(50) OUTPUT
AS
IF (@Accion = '1')
    BEGIN
	DELETE FROM ASIGNACION WHERE IdAsignatura = @IdAsignatura
	SET @Accion = 'Se borro el codigo: '
END
GO

----INSERTAR ASIGNATURA--

CREATE PROC SP_I_ASIGNATURA
	@IdAsignatura nchar(15),
	@Nombre nchar(50),
	@Creditos int,
	@Semestre int
AS
INSERT INTO ASIGNATURA
VALUES(@IdAsignatura, @Nombre, @Creditos, @Semestre)
GO
exec SP_I_ASIGNATURA 'A','base de datos', 4, 5

select *
from ASIGNATURA

--ACTUALIZAR ASIGNATURA-

ALTER PROC SP_U_ASIGNATURA
	@IdAsignatura nchar(15),
	@Nombre nchar(50),
	@Creditos int,
	@Semestre int
AS
UPDATE ASIGNATURA 
	SET IdAsignatura = @IdAsignatura , Nombre = @Nombre ,Creditos=@Creditos, Semestre = @Semestre
	WHERE IdAsignatura = @IdAsignatura
GO
exec SP_U_ASIGNATURA 'B','base de datos', 4, 5

select *
from ASIGNATURA

--BORRAR ASIGNATURA--

CREATE PROC SP_D_ASIGNATURA
	(
	@IdAsignatura nchar(15),
	@Nombre nchar(50),
	@Creditos int,
	@Semestre int,
	@Accion VARCHAR(50) OUTPUT
)
AS
IF (@Accion = '1')
    BEGIN
	DELETE FROM ASIGNATURA WHERE IdAsignatura = @IdAsignatura
	SET @Accion = 'Se borro el codigo: '
END
GO

--INSERTAR PROGRAMA EDUCATIVO
CREATE PROC SP_I_PE
	@IdPE int,
	@ClavePE nchar(15),
	@Nombre nchar(25),
	@Responsable nchar(15),
	@IdUsuario int
AS
INSERT INTO PROGRAMA_EDUCATIVO
VALUES(@IdPE, @ClavePE, @Nombre, @Responsable, @IdUsuario)
GO
exec SP_I_PE 1, '001', 'Tics', 'Ing. Juan', 1
exec SP_I_PE 4, '001', 'Tics', 'Ing. Juan', 2

Select *
from PROGRAMA_EDUCATIVO
GO

--ACTUALIZAR PROGRAMA EDUCATIVO--

ALTER PROC SP_U_PE
	@IdPE int,
	@ClavePE nchar(15),
	@Nombre nchar(25),
	@Responsable nchar(15),
	@IdUsuario int
AS
UPDATE PROGRAMA_EDUCATIVO 
	SET IdPE = @IdPE , ClavePE = @ClavePE ,Nombre =
	@Nombre ,Responsable = @Responsable 
	WHERE IdPE = @IdPE
GO
exec SP_U_PE 5, '001', 'Tics', 'Ing. Juan', 2

Select *
from PROGRAMA_EDUCATIVO
GO

--BORRAR PROGRAMA EDUCATIVO
CREATE PROC SP_D_PE
	@IdPE int,
	@ClavePE nchar(15),
	@Nombre nchar(25),
	@Responsable nchar(15),
	@IdUsuario int,
	@Accion VARCHAR(50) OUTPUT
AS
IF (@Accion = 1)
    BEGIN
	DELETE FROM PROGRAMA_EDUCATIVO WHERE IdPE = @IdPE
	SET @Accion = 'Se borro el codigo: '
END
GO

--INSERTAR USUARIO
CREATE PROC SP_I_USUARIO
	@IdUsuario int,
	@Descripcion nchar(25) NULL,
	@Tipo nchar(15),
	@Usuario nchar(15),
	@Contrasena nchar(15)
AS
INSERT INTO USUARIO
	(IdUsuario, Descripcion, Tipo, Usuario, Contrasena)
VALUES
	(@IdUsuario, @Descripcion, @Tipo, @Usuario, @Contrasena)
GO
exec SP_I_USUARIO 1,'Administrador de ITICS','Administrador','thernandez','talhia'
exec SP_I_USUARIO 2,'Administrador de IIA','Administrador','tomana','fernando'

SELECT *
FROM USUARIO

-- ACTUALIZAR USUARIO
ALTER PROC SP_U_USUARIO
	@IdUsuario int,
	@Descripcion nchar(25) NULL,
	@Tipo nchar(15),
	@Usuario nchar(15),
	@Contrasena nchar(15)
AS
UPDATE USUARIO
	SET Descripcion = @Descripcion ,Tipo = @Tipo, Usuario = @Usuario, Contrasena = @Contrasena
	WHERE IdUsuario = @IdUsuario
GO
exec SP_U_USUARIO 3,'Administrador de ITICS','Administrador','thernandez','talhia'

SELECT *
FROM USUARIO GO

ALTER PROC SP_D_USUARIO
    @IdUsuario int,
    @Descripcion nchar(25) NULL,
    @Tipo nchar(15),
    @Usuario nchar(15),
    @Contrasena nchar(15),
    @Accion VARCHAR(50) OUTPUT
AS
BEGIN
    -- Asegúrate de que la condición evalúe a verdadero
    IF (@IdUsuario IS NOT NULL)
    BEGIN
        DELETE FROM USUARIO WHERE IdUsuario = @IdUsuario;

        -- Establecer el mensaje de salida
        SET @Accion = 'Se borró el código: ' + CAST(@IdUsuario AS VARCHAR);
    END
    ELSE
    BEGIN
        -- Mensaje de error si el ID del usuario no es válido
        SET @Accion = 'No se pudo borrar: ID no válido';
    END
END
GO


---Vista Asesoria--

CREATE VIEW [dbo].[vw_Asesoria]
AS
	SELECT
		ASESORIA.IdAsesoria,
		ASESORIA.Matricula,
		ALUMNO.Nombre AS AlumnoNombre,
		ALUMNO.ApellidoPaterno AS AlumnoApellidoPaterno,
		ALUMNO.ApellidoMaterno AS AlumnoApellidoMaterno,
		ALUMNO.Sexo AS AlumnoSexo,
		ALUMNO.Semestre AS AlumnoSemestre,
		ALUMNO.Grupo AS AlumnoGrupo,
		ALUMNO.Fecha AS AlumnoFechaRegistro,
		ASESORIA.IdAsignatura,
		ASIGNATURA.Nombre AS AsignaturaNombre,
		ASIGNATURA.Creditos AS AsignaturaCreditos,
		ASIGNATURA.Semestre AS AsignaturaSemestre,
		ASESORIA.Tema,
		ASESORIA.Horario AS AsesoriaHorario,
		ASESORIA.FechaRegistro AS AsesoriaFechaRegistro,
		ASESORIA.Estatus,
		ASIGNACION.IdAsesor,
		ASESOR.Nombre AS AsesorNombre,
		ASESOR.ApellidoPaterno AS AsesorApellidoPaterno,
		ASESOR.ApellidoMaterno AS AsesorApellidoMaterno,
		ASESOR.Sexo AS AsesorSexo,
		ASESOR.Telefono AS AsesorTelefono,
		ASESOR.Email AS AsesorEmail,
		PROGRAMA_EDUCATIVO.Nombre AS ProgramaNombre,
		PROGRAMA_EDUCATIVO.ClavePE AS ProgramaClave,
		PROGRAMA_EDUCATIVO.Responsable AS ProgramaResponsable
	FROM
		dbo.ASESORIA
		INNER JOIN dbo.ALUMNO ON ASESORIA.Matricula = ALUMNO.Matricula
		INNER JOIN dbo.ASIGNATURA ON ASESORIA.IdAsignatura = ASIGNATURA.IdAsignatura
		INNER JOIN dbo.ASIGNACION ON ASESORIA.IdAsignatura = ASIGNACION.IdAsignatura
		INNER JOIN dbo.ASESOR ON ASIGNACION.IdAsesor = ASESOR.IdAsesor
		INNER JOIN dbo.PROGRAMA_EDUCATIVO ON ALUMNO.IdPE = PROGRAMA_EDUCATIVO.IdPE
GO

SELECT *
FROM vw_Asesoria
GO

--Vista Bitacora asesoria--
CREATE VIEW [dbo].[vw_Bitacora_asesoria]
AS
	SELECT
		ASESORIA.IdAsesoria,
		ALUMNO.Fecha AS AlumnoFechaRegistro,
		ASESORIA.Matricula,
		ALUMNO.Nombre AS AlumnoNombre,
		ALUMNO.ApellidoPaterno AS AlumnoApellidoPaterno,
		ALUMNO.ApellidoMaterno AS AlumnoApellidoMaterno,
		ASIGNATURA.Nombre AS AsignaturaNombre,
		ASESORIA.Tema,
		PROGRAMA_EDUCATIVO.Nombre AS ProgramaNombre,
		ASESOR.Nombre AS AsesorNombre
	FROM
		dbo.ASESORIA
		INNER JOIN dbo.ALUMNO ON ASESORIA.Matricula = ALUMNO.Matricula
		INNER JOIN dbo.ASIGNATURA ON ASESORIA.IdAsignatura = ASIGNATURA.IdAsignatura
		INNER JOIN dbo.ASIGNACION ON ASESORIA.IdAsignatura = ASIGNACION.IdAsignatura
		INNER JOIN dbo.ASESOR ON ASIGNACION.IdAsesor = ASESOR.IdAsesor
		INNER JOIN dbo.PROGRAMA_EDUCATIVO ON ALUMNO.IdPE = PROGRAMA_EDUCATIVO.IdPE
GO

SELECT * FROM vw_Bitacora_asesoria

--Vista Programa Educativo--
CREATE VIEW [dbo].[vw_Programa_Educativo]
AS
	SELECT
		[IdPE],
		[ClavePE],
		[Nombre],
		[Responsable],
		[IdUsuario]
	FROM
		[dbo].[PROGRAMA_EDUCATIVO];
GO

select *
from vw_Programa_Educativo
GO

-- Vista Asignatura--

CREATE VIEW [dbo].[vw_Asignatura]
AS
	SELECT
		IdAsignatura,
		Nombre,
		Creditos,
		Semestre
	FROM
		[dbo].[ASIGNATURA];
GO

select *
from vw_ASIGNATURA
GO

-- Vista Asesores--

CREATE VIEW [dbo].[vw_Asesores]
AS
	SELECT
		IdAsesor,
		Nombre,
		ApellidoPaterno,
		ApellidoMaterno,
		Sexo,
		Telefono,
		Email,
		IdPE
	FROM
		[dbo].[ASESOR]
GO

select *
from vw_Asesores
GO

--Vista Alumno--

CREATE VIEW [dbo].[vw_Alumno]
AS
	SELECT
		Matricula,
		Nombre,
		ApellidoPaterno,
		ApellidoMaterno,
		Sexo,
		Semestre,
		Grupo,
		Fecha,
		IdPE
	FROM
		[dbo].[ALUMNO];
GO

select *
from ALUMNO
GO

CREATE VIEW [dbo].[VISTA_PROGRAMA_USUARIO]
AS
	SELECT
		U.IdUsuario,
		U.Descripcion AS DescripcionUsuario,
		U.Tipo AS TipoUsuario,
		PE.IdPE,
		PE.ClavePE,
		PE.Nombre AS NombrePrograma,
		PE.Responsable
	FROM
		[dbo].[USUARIO] U
		INNER JOIN
		[dbo].[PROGRAMA_EDUCATIVO] PE
		ON 
    U.IdUsuario = PE.IdUsuario
GO

select * from [VISTA_PROGRAMA_USUARIO]
GO


--INSERTAR ASESOR
ALTER PROCEDURE SP_I_USER
    @IdAsesor INT,
    @Nombre NCHAR(50),
    @ApellidoPaterno NCHAR(50),
    @ApellidoMaterno NCHAR(50),
    @Sexo NCHAR(15),
    @Telefono NCHAR(20),
    @Email NCHAR(20),
    @IdUsuario INT,
    @IdPE INT,
    @Descripcion NCHAR(25) NULL,
    @Tipo NCHAR(15),
    @Usuario NCHAR(15),
    @Contrasena NCHAR(15)
AS
BEGIN
    BEGIN TRY
	    INSERT INTO USUARIO VALUES (@IdUsuario, @Descripcion, @Tipo, @Usuario, @Contrasena);
        INSERT INTO ASESOR VALUES (@IdAsesor, @Nombre, @ApellidoPaterno, @ApellidoMaterno, @Sexo, @Telefono, @Email, @IdUsuario, @IdPE);

    END TRY
    BEGIN CATCH
        -- Manejo de errores
        DECLARE @ErrorMessage NVARCHAR(4000);
        DECLARE @ErrorSeverity INT;
        DECLARE @ErrorState INT;

        SELECT 
            @ErrorMessage = ERROR_MESSAGE(),
            @ErrorSeverity = ERROR_SEVERITY(),
            @ErrorState = ERROR_STATE();

        -- Lanzar el error
        RAISERROR (@ErrorMessage, @ErrorSeverity, @ErrorState);
    END CATCH
END
GO

EXEC SP_I_USER
    @IdAsesor = 31,
    @Nombre = N'Juan',
    @ApellidoPaterno = N'Pérez',
    @ApellidoMaterno = N'López',
    @Sexo = N'Masculino',
    @Telefono = N'1234567890',
    @Email = N'juan@example.com',
    @IdUsuario = 31,
    @IdPE = 4,
    @Descripcion = N'Descripción de prueba',
    @Tipo = N'Asesor',
    @Usuario = N'juan123',
    @Contrasena = N'secret123';

exec SP_I_USER 05, 'Sion', 'Pickford', 'Lahm', 'Masculino', 77232324545, 'sion@itsoeh.edu.mx', 6 ,1 ,'Invitado','Administrador','Sion','123456'


exec SP_I_USER 01, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1, 1, 'Administrador de ITICS','Administrador','thernandez','talhia'
exec SP_I_USER 03, 'Lela', 'Solha', 'Lumley', 'Femenino', 77234678845, 'lela@itsoeh.edu.mx', 3, 1, 'Invitado','Administrador','solha','123456'


exec SP_I_USUARIO 1,'Administrador de ITICS','Administrador','thernandez','talhia'
exec SP_I_USUARIO 2,'Administrador de IIA','Administrador','tomana','fernando'

exec SP_I_ASESOR 01, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1,1
exec SP_I_ASESOR 03, 'Talhia Heidi', 'Hernández', 'Omana', 'Femenino', 7731461841, 'A@itsoeh.edu.mx', 1,1
exec SP_I_ASESOR 02, 'Pedro Jhoan', 'Salazar', 'Perez', 'Masculino', 7721730510, 'B@itsoeh.edu.mx', 1,1
go

ALTER PROCEDURE SP_D_USER
    @IdUsuario INT
AS
BEGIN
    BEGIN TRY
        -- Eliminar registros relacionados en la tabla ASESOR
        DELETE FROM ASESOR WHERE IdUsuario = @IdUsuario;

        -- Eliminar el usuario
        DELETE FROM USUARIO WHERE IdUsuario = @IdUsuario;
        
    END TRY
    BEGIN CATCH
        -- Manejo de errores
        DECLARE @ErrorMessage NVARCHAR(4000);
        DECLARE @ErrorSeverity INT;
        DECLARE @ErrorState INT;

        SELECT 
            @ErrorMessage = ERROR_MESSAGE(),
            @ErrorSeverity = ERROR_SEVERITY(),
            @ErrorState = ERROR_STATE();

        -- Lanzar el error
        RAISERROR (@ErrorMessage, @ErrorSeverity, @ErrorState);
    END CATCH
END
GO

CREATE VIEW [dbo].[vw_Bitacora_asesoria_con_IdAsesor]
AS
SELECT
    ASESORIA.IdAsesoria,
    ALUMNO.Fecha AS AlumnoFechaRegistro,
    ASESORIA.Matricula,
    ALUMNO.Nombre AS AlumnoNombre,
    ALUMNO.ApellidoPaterno AS AlumnoApellidoPaterno,
    ALUMNO.ApellidoMaterno AS AlumnoApellidoMaterno,
    ASIGNATURA.Nombre AS AsignaturaNombre,
    ASESORIA.Tema,
    PROGRAMA_EDUCATIVO.Nombre AS ProgramaNombre,
    ASESOR.Nombre AS AsesorNombre,
    ASESOR.IdAsesor -- Campo adicional para filtrado
FROM
    dbo.ASESORIA
    INNER JOIN dbo.ALUMNO ON ASESORIA.Matricula = ALUMNO.Matricula
    INNER JOIN dbo.ASIGNATURA ON ASESORIA.IdAsignatura = ASIGNATURA.IdAsignatura
    INNER JOIN dbo.ASIGNACION ON ASESORIA.IdAsignatura = ASIGNACION.IdAsignatura
    INNER JOIN dbo.ASESOR ON ASIGNACION.IdAsesor = ASESOR.IdAsesor
    INNER JOIN dbo.PROGRAMA_EDUCATIVO ON ALUMNO.IdPE = PROGRAMA_EDUCATIVO.IdPE;
GO


SELECT * FROM vw_Bitacora_asesoria_con_IdAsesor