USE [HostalClarita]
GO
/****** Object:  Table [dbo].[Cancelacion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cancelacion](
	[idCancelacion] [int] IDENTITY(1,1) NOT NULL,
	[estado] [varchar](20) NULL,
	[fechaCancelacion] [datetime] NULL,
 CONSTRAINT [PK_Cancelacion] PRIMARY KEY CLUSTERED 
(
	[idCancelacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[CancelacionReserva]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[CancelacionReserva](
	[idCancelacion] [int] NOT NULL,
	[idReserva] [int] NOT NULL,
 CONSTRAINT [PK_CancelacionReserva] PRIMARY KEY CLUSTERED 
(
	[idCancelacion] ASC,
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Check]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Check](
	[idEstado] [int] NOT NULL,
	[idReserva] [int] NOT NULL,
	[rutOperador] [varchar](30) NOT NULL,
 CONSTRAINT [PK_Check] PRIMARY KEY CLUSTERED 
(
	[idEstado] ASC,
	[idReserva] ASC,
	[rutOperador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Empresa]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Empresa](
	[rutEmpresa] [varchar](30) NOT NULL,
	[correo] [varchar](30) NOT NULL,
	[clave] [varchar](30) NULL,
	[nombre] [varchar](50) NULL,
	[direccion] [varchar](200) NULL,
	[numero] [numeric](18, 0) NULL,
 CONSTRAINT [PK_Empresa_1] PRIMARY KEY CLUSTERED 
(
	[rutEmpresa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Estado]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Estado](
	[idEstado] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](30) NULL,
 CONSTRAINT [PK_Estado] PRIMARY KEY CLUSTERED 
(
	[idEstado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoHabitacion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoHabitacion](
	[idEstadoHabitacion] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
 CONSTRAINT [PK_EstadoHabitacion] PRIMARY KEY CLUSTERED 
(
	[idEstadoHabitacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoRecepcion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoRecepcion](
	[idEstadoRecepcion] [int] IDENTITY(1,1) NOT NULL,
	[observacion] [varchar](300) NULL,
	[estado] [varchar](20) NULL,
	[fechaRecepcion] [datetime] NULL,
 CONSTRAINT [PK_EstadoRecepcion] PRIMARY KEY CLUSTERED 
(
	[idEstadoRecepcion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoReserva]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[EstadoReserva](
	[idEstado] [int] NOT NULL,
	[idReserva] [int] NOT NULL,
 CONSTRAINT [PK_EstadoReserva] PRIMARY KEY CLUSTERED 
(
	[idEstado] ASC,
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Habitacion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Habitacion](
	[idHabitacion] [int] IDENTITY(1,1) NOT NULL,
	[idEstadoHabitacion] [int] NOT NULL,
	[idTipoHabitacion] [int] NOT NULL,
	[detalle] [varchar](1000) NULL,
	[idReserva] [int] NULL,
 CONSTRAINT [PK_Habitacion] PRIMARY KEY CLUSTERED 
(
	[idHabitacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Huesped]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Huesped](
	[rutHuesped] [varchar](30) NOT NULL,
	[rutEmpresa] [varchar](30) NOT NULL,
	[idReserva] [int] NOT NULL,
	[nombre] [varchar](40) NULL,
	[apellido] [varchar](50) NULL,
	[fechaNacimiento] [date] NULL,
 CONSTRAINT [PK_Huesped] PRIMARY KEY CLUSTERED 
(
	[rutHuesped] ASC,
	[rutEmpresa] ASC,
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HuespedReserva]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[HuespedReserva](
	[idReserva] [int] NOT NULL,
	[rutHuesped] [varchar](30) NOT NULL,
 CONSTRAINT [PK_HuespedReserva] PRIMARY KEY CLUSTERED 
(
	[idReserva] ASC,
	[rutHuesped] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Informe]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Informe](
	[idInforme] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[contenido] [varchar](1000) NULL,
 CONSTRAINT [PK_Informe] PRIMARY KEY CLUSTERED 
(
	[idInforme] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OperadorHostal]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OperadorHostal](
	[rutOperador] [varchar](30) NOT NULL,
	[nombre] [varchar](50) NULL,
	[apellidoPat] [varchar](50) NULL,
	[apellidoMat] [varchar](50) NULL,
	[fechaNacimiento] [date] NULL,
	[fechaContrato] [date] NULL,
 CONSTRAINT [PK_OperadorHostal] PRIMARY KEY CLUSTERED 
(
	[rutOperador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenPedido]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrdenPedido](
	[idOrdenPedido] [int] IDENTITY(1,1) NOT NULL,
	[rutOperador] [varchar](30) NOT NULL,
	[rutProveedor] [varchar](30) NOT NULL,
	[detalle] [varchar](1000) NULL,
	[fechaGenOrden] [datetime] NULL,
	[estado] [varchar](10) NULL,
 CONSTRAINT [PK_OrdenPedido_1] PRIMARY KEY CLUSTERED 
(
	[idOrdenPedido] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenPedido_Producto]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrdenPedido_Producto](
	[idOrdenPedido] [int] NOT NULL,
	[idProducto] [varchar](20) NOT NULL,
	[cantidad] [int] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenRecepcion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrdenRecepcion](
	[idOrdenRecepcion] [varchar](30) NOT NULL,
	[idOrdenPedido] [int] NOT NULL,
	[idEstadoRecepcion] [int] NOT NULL,
	[rutOperador] [varchar](30) NOT NULL,
 CONSTRAINT [PK_OrdenRecepcion] PRIMARY KEY CLUSTERED 
(
	[idOrdenRecepcion] ASC,
	[idOrdenPedido] ASC,
	[idEstadoRecepcion] ASC,
	[rutOperador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Pago]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Pago](
	[idPago] [int] IDENTITY(1,1) NOT NULL,
	[idTipoPago] [int] NOT NULL,
	[idReserva] [int] NOT NULL,
	[valor] [money] NOT NULL,
 CONSTRAINT [PK_Pago] PRIMARY KEY CLUSTERED 
(
	[idPago] ASC,
	[idTipoPago] ASC,
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Producto]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Producto](
	[idProducto] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](30) NULL,
	[valor] [money] NULL,
	[rutProveedor] [varchar](30) NULL,
	[familia] [varchar](30) NULL,
	[fechaVencimiento] [date] NULL,
	[stock] [int] NULL,
	[codigo] [varchar](30) NULL,
 CONSTRAINT [PK_Producto] PRIMARY KEY CLUSTERED 
(
	[idProducto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Proveedor]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Proveedor](
	[rutProveedor] [varchar](30) NOT NULL,
	[direccion] [varchar](50) NULL,
	[nombre] [varchar](30) NULL,
	[idRubro] [int] NULL,
 CONSTRAINT [PK_Proveedor] PRIMARY KEY CLUSTERED 
(
	[rutProveedor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Reserva]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Reserva](
	[idReserva] [int] IDENTITY(1,1) NOT NULL,
	[fechaReserva] [datetime] NULL,
	[fechaInicio] [datetime] NULL,
	[fechaTermino] [datetime] NULL,
	[costoTotal] [money] NULL,
	[adults] [int] NULL,
	[children] [int] NULL,
	[usuario] [varchar](40) NULL,
 CONSTRAINT [PK_Reserva] PRIMARY KEY CLUSTERED 
(
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Rubro]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Rubro](
	[idRubro] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
 CONSTRAINT [PK_Rubro] PRIMARY KEY CLUSTERED 
(
	[idRubro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[SolicitudInforme]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[SolicitudInforme](
	[idSolicitud] [int] IDENTITY(1,1) NOT NULL,
	[idInforme] [int] NOT NULL,
	[rutOperador] [varchar](30) NOT NULL,
 CONSTRAINT [PK_SolicitudInforme] PRIMARY KEY CLUSTERED 
(
	[idSolicitud] ASC,
	[idInforme] ASC,
	[rutOperador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoHabitacion]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TipoHabitacion](
	[idTipoHabitacion] [int] IDENTITY(1,1) NOT NULL,
	[valor] [money] NULL,
	[nombre] [varchar](50) NULL,
	[detalle] [varchar](1000) NULL,
 CONSTRAINT [PK_TipoHabitacion] PRIMARY KEY CLUSTERED 
(
	[idTipoHabitacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoPago]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TipoPago](
	[idTipoPago] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](20) NULL,
 CONSTRAINT [PK_TipoPago] PRIMARY KEY CLUSTERED 
(
	[idTipoPago] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 09-11-2022 2:20:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuario](
	[rutUsuario] [varchar](30) NOT NULL,
	[clave] [varchar](30) NULL,
	[tipoUsuario] [char](3) NULL,
 CONSTRAINT [PK_Usuario] PRIMARY KEY CLUSTERED 
(
	[rutUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[Empresa] ([rutEmpresa], [correo], [clave], [nombre], [direccion], [numero]) VALUES (N'197865543', N'sueldosricos@gmail.com', N'pp90ijsmnd..,.12309', N'Sueldos Ricos SPA', N'Romina Sur Palmiro, Jorge Pilar, #222', CAST(942331232 AS Numeric(18, 0)))
INSERT [dbo].[Empresa] ([rutEmpresa], [correo], [clave], [nombre], [direccion], [numero]) VALUES (N'21333221', N'malyaso@gmail.com', N'oo987ghyt2', N'Malvados y asociados', N'Poblacion Libertad, pasaje 3 poniente, #323. Chillán, Chile', NULL)
INSERT [dbo].[Empresa] ([rutEmpresa], [correo], [clave], [nombre], [direccion], [numero]) VALUES (N'33292319', N'floranis@gmail.com', N'221019AN22', N'Flor de Anís', N'Poblacion Guerra, pasaje 19 pereira, #272. Valparaiso, Chile', NULL)
INSERT [dbo].[Empresa] ([rutEmpresa], [correo], [clave], [nombre], [direccion], [numero]) VALUES (N'44762312', N'gamesproductiosn@gmail.com', N'jku3820ksdio', N'Games Productions', N'Poblacion ginebra, pasaje 2 amanecer, #444. Santiago, Chile', NULL)
GO
SET IDENTITY_INSERT [dbo].[Estado] ON 

INSERT [dbo].[Estado] ([idEstado], [nombre]) VALUES (1, N'Confirmada')
INSERT [dbo].[Estado] ([idEstado], [nombre]) VALUES (2, N'Cancelada')
INSERT [dbo].[Estado] ([idEstado], [nombre]) VALUES (3, N'Activa')
INSERT [dbo].[Estado] ([idEstado], [nombre]) VALUES (4, N'Terminada')
INSERT [dbo].[Estado] ([idEstado], [nombre]) VALUES (5, N'Pendiente de Pago')
SET IDENTITY_INSERT [dbo].[Estado] OFF
GO
SET IDENTITY_INSERT [dbo].[EstadoHabitacion] ON 

INSERT [dbo].[EstadoHabitacion] ([idEstadoHabitacion], [nombre]) VALUES (1, N'Libre')
INSERT [dbo].[EstadoHabitacion] ([idEstadoHabitacion], [nombre]) VALUES (2, N'Ocupada')
INSERT [dbo].[EstadoHabitacion] ([idEstadoHabitacion], [nombre]) VALUES (3, N'Mantenimiento')
SET IDENTITY_INSERT [dbo].[EstadoHabitacion] OFF
GO
INSERT [dbo].[EstadoReserva] ([idEstado], [idReserva]) VALUES (5, 17)
GO
SET IDENTITY_INSERT [dbo].[Habitacion] ON 

INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (8, 2, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (9, 2, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (10, 1, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (11, 1, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (12, 1, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (13, 2, 3, N'Habitación de tipo Doble. Con 2 Camas', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (14, 2, 3, N'Habitación de tipo Doble. Con 2 Camas', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (15, 1, 3, N'Habitación de tipo Doble. Con 2 Camas', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (16, 1, 3, N'Habitación de tipo Doble. Con 2 Camas', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (17, 1, 3, N'Habitación de tipo Doble. Con 2 Camas', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (18, 1, 4, N'', NULL)
INSERT [dbo].[Habitacion] ([idHabitacion], [idEstadoHabitacion], [idTipoHabitacion], [detalle], [idReserva]) VALUES (19, 1, 2, N'Habitación de tipo Simple. Con una sola Cama', NULL)
SET IDENTITY_INSERT [dbo].[Habitacion] OFF
GO
SET IDENTITY_INSERT [dbo].[Informe] ON 

INSERT [dbo].[Informe] ([idInforme], [nombre], [contenido]) VALUES (2, N'Informacion Total', N'Registro de todos los movimientos')
INSERT [dbo].[Informe] ([idInforme], [nombre], [contenido]) VALUES (3, N'Informacion de reservas', N'Registro de todas las reservas del mes')
INSERT [dbo].[Informe] ([idInforme], [nombre], [contenido]) VALUES (4, N'Informacion de ordenes pedido', N'Registro de todas las ordenes de Pedido')
INSERT [dbo].[Informe] ([idInforme], [nombre], [contenido]) VALUES (5, N'Informacion de ordenes recepcion', N'Registro de todas las ordenes de recibidas')
INSERT [dbo].[Informe] ([idInforme], [nombre], [contenido]) VALUES (6, N'Informacion de visitas web', N'Registro de todas las visitas web')
SET IDENTITY_INSERT [dbo].[Informe] OFF
GO
INSERT [dbo].[OperadorHostal] ([rutOperador], [nombre], [apellidoPat], [apellidoMat], [fechaNacimiento], [fechaContrato]) VALUES (N'192231232', N'Pedro', N'Martinez', N'Romanoff', CAST(N'1993-12-13' AS Date), CAST(N'2007-02-12' AS Date))
INSERT [dbo].[OperadorHostal] ([rutOperador], [nombre], [apellidoPat], [apellidoMat], [fechaNacimiento], [fechaContrato]) VALUES (N'192321231', N'Miguel', N'Navarro', N'Lopez', CAST(N'1989-07-09' AS Date), CAST(N'2002-03-22' AS Date))
INSERT [dbo].[OperadorHostal] ([rutOperador], [nombre], [apellidoPat], [apellidoMat], [fechaNacimiento], [fechaContrato]) VALUES (N'223321232', N'Jorge', N'Fernandez', N'Pereira', CAST(N'1987-10-22' AS Date), CAST(N'2010-08-13' AS Date))
INSERT [dbo].[OperadorHostal] ([rutOperador], [nombre], [apellidoPat], [apellidoMat], [fechaNacimiento], [fechaContrato]) VALUES (N'81233211', N'Juan', N'Mardonez', N'Cartes', CAST(N'1983-07-21' AS Date), CAST(N'2012-01-12' AS Date))
GO
SET IDENTITY_INSERT [dbo].[OrdenPedido] ON 

INSERT [dbo].[OrdenPedido] ([idOrdenPedido], [rutOperador], [rutProveedor], [detalle], [fechaGenOrden], [estado]) VALUES (2, N'192231232', N'128723132', N'MERCADERIA MES OCTUBRE', CAST(N'2022-10-01T00:00:00.000' AS DateTime), N'Pendiente')
INSERT [dbo].[OrdenPedido] ([idOrdenPedido], [rutOperador], [rutProveedor], [detalle], [fechaGenOrden], [estado]) VALUES (3, N'192231232', N'128723132', N'MERCADERIA MES SEPTIEMBRE', CAST(N'2022-09-01T00:00:00.000' AS DateTime), N'Cerrada')
INSERT [dbo].[OrdenPedido] ([idOrdenPedido], [rutOperador], [rutProveedor], [detalle], [fechaGenOrden], [estado]) VALUES (4, N'192231232', N'128723132', N'MERCADERIA MES AGOSTO', CAST(N'2022-08-01T00:00:00.000' AS DateTime), N'Cerrada')
INSERT [dbo].[OrdenPedido] ([idOrdenPedido], [rutOperador], [rutProveedor], [detalle], [fechaGenOrden], [estado]) VALUES (5, N'192231232', N'128723132', N'MERCADERIA MES JULIO', CAST(N'2022-07-01T00:00:00.000' AS DateTime), N'Cerrada')
INSERT [dbo].[OrdenPedido] ([idOrdenPedido], [rutOperador], [rutProveedor], [detalle], [fechaGenOrden], [estado]) VALUES (6, N'192231232', N'128723132', N'MERCADERIA MES JUNIO', CAST(N'2022-06-01T00:00:00.000' AS DateTime), N'Cerrada')
SET IDENTITY_INSERT [dbo].[OrdenPedido] OFF
GO
INSERT [dbo].[OrdenPedido_Producto] ([idOrdenPedido], [idProducto], [cantidad]) VALUES (2, N'1', 3)
GO
SET IDENTITY_INSERT [dbo].[Producto] ON 

INSERT [dbo].[Producto] ([idProducto], [nombre], [valor], [rutProveedor], [familia], [fechaVencimiento], [stock], [codigo]) VALUES (1, N'ZAPALLOS 1 KG', 1500.0000, N'128723132', N'VERDURAS', CAST(N'2022-11-20' AS Date), 3, N'128VER20221120Z1')
INSERT [dbo].[Producto] ([idProducto], [nombre], [valor], [rutProveedor], [familia], [fechaVencimiento], [stock], [codigo]) VALUES (2, N'FIDEOS 200GR', 1300.0000, N'128723132', N'FIDEOS', NULL, 12, N'128FID00000000F2')
INSERT [dbo].[Producto] ([idProducto], [nombre], [valor], [rutProveedor], [familia], [fechaVencimiento], [stock], [codigo]) VALUES (7, N'Pollo', 2345.0000, N'192323132', N'CARNES', CAST(N'2022-11-14' AS Date), 21, N'192CAR20221114P7')
INSERT [dbo].[Producto] ([idProducto], [nombre], [valor], [rutProveedor], [familia], [fechaVencimiento], [stock], [codigo]) VALUES (8, N'COLCHON KING', 45000.0000, N'223927763', N'COLCHONES', NULL, 25, N'223COL00000000C8')
SET IDENTITY_INSERT [dbo].[Producto] OFF
GO
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'128723132', N'Jorgue Sepulveda #1232, Chillan', N'Santa Josefina', 1)
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'192323132', N'San Marcos Nº 531, Arica', N'Carniceria Pascal', 3)
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'223012322', N'Camilo Henríquez Nº 281, Valdivia', N'Wonder Muebles', 5)
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'223927763', N'Eduardo de La Barra N° 480, La Serena', N'Morfeos Bed', 7)
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'332203921', N'Ignacio Carrera Pinto 185, Punta Arena', N'Sweet Home', 2)
INSERT [dbo].[Proveedor] ([rutProveedor], [direccion], [nombre], [idRubro]) VALUES (N'983321232', N'Barros Arana N° 492. Torre Ligure. Concepción', N'ElecServices', 6)
GO
SET IDENTITY_INSERT [dbo].[Reserva] ON 

INSERT [dbo].[Reserva] ([idReserva], [fechaReserva], [fechaInicio], [fechaTermino], [costoTotal], [adults], [children], [usuario]) VALUES (17, CAST(N'2022-11-09T02:14:45.133' AS DateTime), CAST(N'2022-11-11T00:00:00.000' AS DateTime), CAST(N'2022-11-25T00:00:00.000' AS DateTime), 45000.0000, 2, 1, N'floranis@gmail.com')
SET IDENTITY_INSERT [dbo].[Reserva] OFF
GO
SET IDENTITY_INSERT [dbo].[Rubro] ON 

INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (1, N'ALIMENTOS')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (2, N'ARTICULOS DEL HOGAR')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (3, N'CARNICERIA')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (4, N'ELEMENTOS DE LIMPIEZA')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (5, N'EQUIPO DE OFICINA Y MUEBLES')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (6, N'EQUIPO ELECTRICOS')
INSERT [dbo].[Rubro] ([idRubro], [nombre]) VALUES (7, N'FABRICA DE COLCHONES Y FRAZADAS')
SET IDENTITY_INSERT [dbo].[Rubro] OFF
GO
SET IDENTITY_INSERT [dbo].[TipoHabitacion] ON 

INSERT [dbo].[TipoHabitacion] ([idTipoHabitacion], [valor], [nombre], [detalle]) VALUES (2, 30000.0000, N'Simple', N'Habitación con una sola cama. Pensadas para la estadía individual.')
INSERT [dbo].[TipoHabitacion] ([idTipoHabitacion], [valor], [nombre], [detalle]) VALUES (3, 45000.0000, N'Doble', N'Habitación con dos camas. Pensadas para la estadía compartida de 2 huéspedes.')
INSERT [dbo].[TipoHabitacion] ([idTipoHabitacion], [valor], [nombre], [detalle]) VALUES (4, 500000.0000, N'Comedor', N'Comedor amplio para desarrollar diversas actividades. Máximo de personas: 120 aproximadamente.')
SET IDENTITY_INSERT [dbo].[TipoHabitacion] OFF
GO
SET IDENTITY_INSERT [dbo].[TipoPago] ON 

INSERT [dbo].[TipoPago] ([idTipoPago], [nombre]) VALUES (1, N'Tarjeta Credito')
INSERT [dbo].[TipoPago] ([idTipoPago], [nombre]) VALUES (2, N'Tarjeta Debito')
INSERT [dbo].[TipoPago] ([idTipoPago], [nombre]) VALUES (3, N'Transferencia')
INSERT [dbo].[TipoPago] ([idTipoPago], [nombre]) VALUES (4, N'Efectivo')
SET IDENTITY_INSERT [dbo].[TipoPago] OFF
GO
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'128723132', N'op90hyutxsa.,,0922', N'PRO')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'192231232', N'oo987ghyt2', N'OPE')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'192321231', N'oo987ghyt2', N'OPE')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'192323132', N'pp8gwTymYdt2324', N'PRO')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'223012322', N'oo987ghyt2', N'PRO')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'223321232', N'oo987ghyt2', N'OPE')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'223927763', N'oo987ghyt2', N'PRO')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'332203921', N'oo987ghyt2', N'PRO')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'81233211', N'oo987ghyt2', N'OPE')
INSERT [dbo].[Usuario] ([rutUsuario], [clave], [tipoUsuario]) VALUES (N'983321232', N'oo987ghyt2', N'PRO')
GO
ALTER TABLE [dbo].[CancelacionReserva]  WITH CHECK ADD  CONSTRAINT [FK_CancelacionReserva_Cancelacion] FOREIGN KEY([idCancelacion])
REFERENCES [dbo].[Cancelacion] ([idCancelacion])
GO
ALTER TABLE [dbo].[CancelacionReserva] CHECK CONSTRAINT [FK_CancelacionReserva_Cancelacion]
GO
ALTER TABLE [dbo].[CancelacionReserva]  WITH CHECK ADD  CONSTRAINT [FK_CancelacionReserva_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[CancelacionReserva] CHECK CONSTRAINT [FK_CancelacionReserva_Reserva]
GO
ALTER TABLE [dbo].[Check]  WITH CHECK ADD  CONSTRAINT [FK_Check_Estado] FOREIGN KEY([idEstado])
REFERENCES [dbo].[Estado] ([idEstado])
GO
ALTER TABLE [dbo].[Check] CHECK CONSTRAINT [FK_Check_Estado]
GO
ALTER TABLE [dbo].[Check]  WITH CHECK ADD  CONSTRAINT [FK_Check_OperadorHostal] FOREIGN KEY([rutOperador])
REFERENCES [dbo].[OperadorHostal] ([rutOperador])
GO
ALTER TABLE [dbo].[Check] CHECK CONSTRAINT [FK_Check_OperadorHostal]
GO
ALTER TABLE [dbo].[Check]  WITH CHECK ADD  CONSTRAINT [FK_Check_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[Check] CHECK CONSTRAINT [FK_Check_Reserva]
GO
ALTER TABLE [dbo].[EstadoReserva]  WITH CHECK ADD  CONSTRAINT [FK_EstadoReserva_Estado] FOREIGN KEY([idEstado])
REFERENCES [dbo].[Estado] ([idEstado])
GO
ALTER TABLE [dbo].[EstadoReserva] CHECK CONSTRAINT [FK_EstadoReserva_Estado]
GO
ALTER TABLE [dbo].[EstadoReserva]  WITH CHECK ADD  CONSTRAINT [FK_EstadoReserva_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[EstadoReserva] CHECK CONSTRAINT [FK_EstadoReserva_Reserva]
GO
ALTER TABLE [dbo].[Habitacion]  WITH CHECK ADD  CONSTRAINT [FK_Habitacion_EstadoHabitacion] FOREIGN KEY([idEstadoHabitacion])
REFERENCES [dbo].[EstadoHabitacion] ([idEstadoHabitacion])
GO
ALTER TABLE [dbo].[Habitacion] CHECK CONSTRAINT [FK_Habitacion_EstadoHabitacion]
GO
ALTER TABLE [dbo].[Habitacion]  WITH CHECK ADD  CONSTRAINT [FK_Habitacion_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[Habitacion] CHECK CONSTRAINT [FK_Habitacion_Reserva]
GO
ALTER TABLE [dbo].[Habitacion]  WITH CHECK ADD  CONSTRAINT [FK_Habitacion_TipoHabitacion1] FOREIGN KEY([idTipoHabitacion])
REFERENCES [dbo].[TipoHabitacion] ([idTipoHabitacion])
GO
ALTER TABLE [dbo].[Habitacion] CHECK CONSTRAINT [FK_Habitacion_TipoHabitacion1]
GO
ALTER TABLE [dbo].[Huesped]  WITH CHECK ADD  CONSTRAINT [FK_Huesped_Empresa] FOREIGN KEY([rutEmpresa])
REFERENCES [dbo].[Empresa] ([rutEmpresa])
GO
ALTER TABLE [dbo].[Huesped] CHECK CONSTRAINT [FK_Huesped_Empresa]
GO
ALTER TABLE [dbo].[Huesped]  WITH CHECK ADD  CONSTRAINT [FK_Huesped_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[Huesped] CHECK CONSTRAINT [FK_Huesped_Reserva]
GO
ALTER TABLE [dbo].[HuespedReserva]  WITH CHECK ADD  CONSTRAINT [FK_HuespedReserva_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[HuespedReserva] CHECK CONSTRAINT [FK_HuespedReserva_Reserva]
GO
ALTER TABLE [dbo].[OperadorHostal]  WITH CHECK ADD  CONSTRAINT [FK_OperadorHostal_Usuario] FOREIGN KEY([rutOperador])
REFERENCES [dbo].[Usuario] ([rutUsuario])
GO
ALTER TABLE [dbo].[OperadorHostal] CHECK CONSTRAINT [FK_OperadorHostal_Usuario]
GO
ALTER TABLE [dbo].[OrdenPedido]  WITH CHECK ADD  CONSTRAINT [FK_OrdenPedido_OperadorHostal] FOREIGN KEY([rutOperador])
REFERENCES [dbo].[OperadorHostal] ([rutOperador])
GO
ALTER TABLE [dbo].[OrdenPedido] CHECK CONSTRAINT [FK_OrdenPedido_OperadorHostal]
GO
ALTER TABLE [dbo].[OrdenPedido]  WITH CHECK ADD  CONSTRAINT [FK_OrdenPedido_Proveedor] FOREIGN KEY([rutProveedor])
REFERENCES [dbo].[Proveedor] ([rutProveedor])
GO
ALTER TABLE [dbo].[OrdenPedido] CHECK CONSTRAINT [FK_OrdenPedido_Proveedor]
GO
ALTER TABLE [dbo].[OrdenPedido_Producto]  WITH CHECK ADD  CONSTRAINT [FK_OrdenPedido_Producto_OrdenPedido] FOREIGN KEY([idOrdenPedido])
REFERENCES [dbo].[OrdenPedido] ([idOrdenPedido])
GO
ALTER TABLE [dbo].[OrdenPedido_Producto] CHECK CONSTRAINT [FK_OrdenPedido_Producto_OrdenPedido]
GO
ALTER TABLE [dbo].[OrdenRecepcion]  WITH CHECK ADD  CONSTRAINT [FK_OrdenRecepcion_EstadoRecepcion] FOREIGN KEY([idEstadoRecepcion])
REFERENCES [dbo].[EstadoRecepcion] ([idEstadoRecepcion])
GO
ALTER TABLE [dbo].[OrdenRecepcion] CHECK CONSTRAINT [FK_OrdenRecepcion_EstadoRecepcion]
GO
ALTER TABLE [dbo].[OrdenRecepcion]  WITH CHECK ADD  CONSTRAINT [FK_OrdenRecepcion_OperadorHostal] FOREIGN KEY([rutOperador])
REFERENCES [dbo].[OperadorHostal] ([rutOperador])
GO
ALTER TABLE [dbo].[OrdenRecepcion] CHECK CONSTRAINT [FK_OrdenRecepcion_OperadorHostal]
GO
ALTER TABLE [dbo].[OrdenRecepcion]  WITH CHECK ADD  CONSTRAINT [FK_OrdenRecepcion_OrdenPedido] FOREIGN KEY([idOrdenPedido])
REFERENCES [dbo].[OrdenPedido] ([idOrdenPedido])
GO
ALTER TABLE [dbo].[OrdenRecepcion] CHECK CONSTRAINT [FK_OrdenRecepcion_OrdenPedido]
GO
ALTER TABLE [dbo].[Pago]  WITH CHECK ADD  CONSTRAINT [FK_Pago_Reserva] FOREIGN KEY([idReserva])
REFERENCES [dbo].[Reserva] ([idReserva])
GO
ALTER TABLE [dbo].[Pago] CHECK CONSTRAINT [FK_Pago_Reserva]
GO
ALTER TABLE [dbo].[Pago]  WITH CHECK ADD  CONSTRAINT [FK_Pago_TipoPago] FOREIGN KEY([idTipoPago])
REFERENCES [dbo].[TipoPago] ([idTipoPago])
GO
ALTER TABLE [dbo].[Pago] CHECK CONSTRAINT [FK_Pago_TipoPago]
GO
ALTER TABLE [dbo].[Producto]  WITH CHECK ADD  CONSTRAINT [FK_Producto_Proveedor] FOREIGN KEY([rutProveedor])
REFERENCES [dbo].[Proveedor] ([rutProveedor])
GO
ALTER TABLE [dbo].[Producto] CHECK CONSTRAINT [FK_Producto_Proveedor]
GO
ALTER TABLE [dbo].[Proveedor]  WITH CHECK ADD  CONSTRAINT [FK_Proveedor_Rubro] FOREIGN KEY([idRubro])
REFERENCES [dbo].[Rubro] ([idRubro])
GO
ALTER TABLE [dbo].[Proveedor] CHECK CONSTRAINT [FK_Proveedor_Rubro]
GO
ALTER TABLE [dbo].[Proveedor]  WITH CHECK ADD  CONSTRAINT [FK_Proveedor_Usuario] FOREIGN KEY([rutProveedor])
REFERENCES [dbo].[Usuario] ([rutUsuario])
GO
ALTER TABLE [dbo].[Proveedor] CHECK CONSTRAINT [FK_Proveedor_Usuario]
GO
ALTER TABLE [dbo].[SolicitudInforme]  WITH CHECK ADD  CONSTRAINT [FK_SolicitudInforme_Informe] FOREIGN KEY([idInforme])
REFERENCES [dbo].[Informe] ([idInforme])
GO
ALTER TABLE [dbo].[SolicitudInforme] CHECK CONSTRAINT [FK_SolicitudInforme_Informe]
GO
ALTER TABLE [dbo].[SolicitudInforme]  WITH CHECK ADD  CONSTRAINT [FK_SolicitudInforme_OperadorHostal] FOREIGN KEY([rutOperador])
REFERENCES [dbo].[OperadorHostal] ([rutOperador])
GO
ALTER TABLE [dbo].[SolicitudInforme] CHECK CONSTRAINT [FK_SolicitudInforme_OperadorHostal]
GO
