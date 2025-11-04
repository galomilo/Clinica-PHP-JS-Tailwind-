CREATE TABLE paciente (
    id_pac int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50),
    apellido varchar(50),
    id_diagno int,
    foto varchar(100) DEFAULT 'sin_foto.png',
    obra_social varchar(100) DEFAULT 'ninguna'
);

CREATE TABLE diagnostico (
    id_diagno int AUTO_INCREMENT PRIMARY KEY,
    descri_internacion text,
    diagnostico_principal varchar(100) DEFAULT 'en curso',
    costo_adicional float DEFAULT 0
);

CREATE TABLE consulta (
    id_consulta int AUTO_INCREMENT PRIMARY KEY,
    id_diagno int,
    id_pac int,
    monto_total float,
    nivel_urgencia varchar(50) DEFAULT 'baja'
);
