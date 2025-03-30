from typing import List, Tuple, Dict

def cabe_en_caja(caja: Tuple[int, int, int], objeto: Tuple[int, int, int, float]) -> bool:
    caja_ancho, caja_alto, caja_profundo = caja
    ancho, alto, profundo = objeto[:3]
    return ancho <= caja_ancho and alto <= caja_alto and profundo <= caja_profundo

def volumen_total(caja: Tuple[int, int, int]) -> int:
    return caja[0] * caja[1] * caja[2]

def espacio_disponible(x, y, z, ancho, alto, profundo, puntos_ocupados):
    for ox, oy, oz, ow, oh, od in puntos_ocupados:
        if not (x + ancho <= ox or x >= ox + ow or y + alto <= oy or y >= oy + oh or z + profundo <= oz or z >= oz + od):
            return False
    return True

def empacar_objetos(caja: Tuple[int, int, int], objetos: List[Tuple[int, int, int, float]], caja_id: int) -> Dict:
    volumen_caja = volumen_total(caja)
    volumen_ocupado = 0
    peso_total = 0
    objetos_empacados = []
    objetos_no_empacados = []
    puntos_ocupados = []

    objetos.sort(key=lambda obj: obj[0] * obj[1] * obj[2], reverse=True)

    for objeto in objetos:
        ancho, alto, profundo, peso = objeto
        colocado = False
        for x in range(caja[0] - ancho + 1):
            for y in range(caja[1] - alto + 1):
                for z in range(caja[2] - profundo + 1):
                    if espacio_disponible(x, y, z, ancho, alto, profundo, puntos_ocupados):
                        puntos_ocupados.append((x, y, z, ancho, alto, profundo))
                        objetos_empacados.append((x, y, z, ancho, alto, profundo, peso, caja_id))
                        volumen_ocupado += ancho * alto * profundo
                        peso_total += peso
                        colocado = True
                        break
                if colocado:
                    break
            if colocado:
                break
        if not colocado:
            objetos_no_empacados.append(objeto)

    porcentaje_usado = (volumen_ocupado / volumen_caja) * 100 if volumen_caja > 0 else 0

    return {
        'objetos_empacados': objetos_empacados,
        'objetos_no_empacados': objetos_no_empacados,
        'volumen_ocupado': volumen_ocupado,
        'volumen_caja': volumen_caja,
        'porcentaje_usado': porcentaje_usado,
        'peso_total': peso_total
    }

cajas = [
    {'id': 1, 'peso': 1, 'dimensiones': (20, 20, 20), 'precio': 180},
    {'id': 2, 'peso': 5, 'dimensiones': (20, 30, 40), 'precio': 250},
    {'id': 3, 'peso': 10, 'dimensiones': (20, 40, 50), 'precio': 350},
    {'id': 4, 'peso': 20, 'dimensiones': (30, 40, 50), 'precio': 550},
    {'id': 5, 'peso': 30, 'dimensiones': (30, 40, 50), 'precio': 650},
    {'id': 6, 'peso': 40, 'dimensiones': (40, 40, 60), 'precio': 850},
    {'id': 7, 'peso': 20, 'dimensiones': (200, 20, 20), 'precio': 1100}
]

objetos = [
    (100, 100, 100, 2),
    (15, 10, 5, 1.5),
    (5, 5, 5, 0.5),
    (8, 8, 8, 1),
    (12, 10, 10, 2.2)
]

peso_total_objetos = sum(obj[3] for obj in objetos)

cajas_filtradas = [caja for caja in cajas if caja['peso'] >= peso_total_objetos]

mejor_resultado = None
mejor_caja = None

for caja in cajas_filtradas:
    resultado = empacar_objetos(caja['dimensiones'], objetos, caja['id'])
    if not mejor_resultado or resultado['porcentaje_usado'] > mejor_resultado['porcentaje_usado']:
        mejor_resultado = resultado
        mejor_caja = caja

if mejor_caja:
    print(f"Mejor caja seleccionada (peso: {mejor_caja['peso']}kg, precio: ${mejor_caja['precio']})")
    print(f"Dimensiones: {mejor_caja['dimensiones']}")
    print(f"Volumen usado: {mejor_resultado['volumen_ocupado']} cm³")
    print(f"Volumen total: {mejor_resultado['volumen_caja']} cm³")
    print(f"Porcentaje de espacio utilizado: {round(mejor_resultado['porcentaje_usado'], 2)}%")
    print(f"Peso total empacado: {mejor_resultado['peso_total']} kg")
    print("Objetos empacados:")
    for obj in mejor_resultado['objetos_empacados']:
        print(obj)
    print("Objetos no empacados:")
    for obj in mejor_resultado['objetos_no_empacados']:
        print(obj)
else:
    print("No hay cajas que soporten el peso total de los objetos.")
