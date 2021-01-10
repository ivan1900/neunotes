export function getPath() {
    // Necesitamos saber el paht para llamar a la función get_clasifiaciones medianta ajax
    // Primero obteno el pathname que seria algo asi como /ignitert/procesos
    var pathActual = $(location).attr('pathname');
    // Separo cuando hay una "/" en diferentes partes
    var piezas = pathActual.split("/");
    // Reconstruimos pero solo utilizamos la parte 1 y 2 que es justo lo que necesitamos
    pathActual = "/"+piezas[1]+"/"+piezas[2];
    return pathActual;
};