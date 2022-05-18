select e.apodo, ee.cue_anexo, l.id l_id, lo.id lo_id, oe.id oe_id
, car.nombre, t.codigo 
from establecimiento e 
inner join establecimiento_edificio ee on ee.establecimiento_id =e.id 
inner join localizacion l on l.establecimiento_edificio_id =ee.id 
inner join localizacion_oe lo on lo.localizacion_id =l.id 
inner join localizacion_oeturno lo2 on lo.id =lo2.localizacion_oe_id 
inner join turno t on t.id=lo2.turno_id 
inner join oferta_educativa oe on lo.oferta_educativa_id =oe.id
inner join carrera car on car.id=oe.carrera_id 
order by e.apodo, ee.cue_anexo, t.orden 
