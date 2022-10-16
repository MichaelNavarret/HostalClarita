USE [HostalClarita]
GO
/****** Object:  Table [dbo].[Cancelacion]    Script Date: 15-10-2022 21:14:59 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[CancelacionReserva]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Check]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Empresa]    Script Date: 15-10-2022 21:15:00 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Empresa](
	[rutEmpresa] [varchar](30) NOT NULL,
	[correo] [varchar](30) NOT NULL,
	[contraseña] [varchar](30) NULL,
	[nombre] [varchar](50) NULL,
	[direccion] [varchar](200) NULL,
 CONSTRAINT [PK_Empresa_1] PRIMARY KEY CLUSTERED 
(
	[rutEmpresa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Estado]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoHabitacion]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoRecepcion]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[EstadoReserva]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Habitacion]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Huesped]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[HuespedReserva]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Informe]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OperadorHostal]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenPedido]    Script Date: 15-10-2022 21:15:00 ******/
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
 CONSTRAINT [PK_OrdenPedido_1] PRIMARY KEY CLUSTERED 
(
	[idOrdenPedido] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenPedido_Producto]    Script Date: 15-10-2022 21:15:00 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrdenPedido_Producto](
	[idOrdenPedido] [int] NOT NULL,
	[idProducto] [int] NOT NULL,
 CONSTRAINT [PK_OrdenPedido_Producto] PRIMARY KEY CLUSTERED 
(
	[idOrdenPedido] ASC,
	[idProducto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[OrdenRecepcion]    Script Date: 15-10-2022 21:15:00 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrdenRecepcion](
	[idOrdenRecepcion] [int] IDENTITY(1,1) NOT NULL,
	[idOrdenPedido] [int] NOT NULL,
	[idEstadoRecepcion] [int] NOT NULL,
	[rutOperador] [varchar](30) NOT NULL,
 CONSTRAINT [PK_OrdenRecepcion] PRIMARY KEY CLUSTERED 
(
	[idOrdenRecepcion] ASC,
	[idOrdenPedido] ASC,
	[idEstadoRecepcion] ASC,
	[rutOperador] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Pago]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Proveedor]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Reserva]    Script Date: 15-10-2022 21:15:00 ******/
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
 CONSTRAINT [PK_Reserva] PRIMARY KEY CLUSTERED 
(
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Rubro]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[SolicitudInforme]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoHabitacion]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TipoPago]    Script Date: 15-10-2022 21:15:00 ******/
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
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
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
ALTER TABLE [dbo].[Proveedor]  WITH CHECK ADD  CONSTRAINT [FK_Proveedor_Rubro] FOREIGN KEY([idRubro])
REFERENCES [dbo].[Rubro] ([idRubro])
GO
ALTER TABLE [dbo].[Proveedor] CHECK CONSTRAINT [FK_Proveedor_Rubro]
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
