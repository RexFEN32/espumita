import pandas as pd
import sys
import xlsxwriter
import mysql.connector
id=str(sys.argv[1])
cnx = mysql.connector.connect(user='tyrsa',
                              password='1234',
                              host='localhost',
                              port='8111',
                              database='u458219132_tyrsawesadmin',
                              use_pure=False)
query = ('SELECT i.reg_date,i.invoice, c.id, c.alias, items.family, items.description, c.customer_suburb, coins.code, coins.coin, items.import from internal_orders as i inner join items on i.id=items.internal_order_id INNER JOIN customers as c on c.id = i.customer_id INNER JOIN coins on coins.id = i.coin_id;')
items=pd.read_sql(query,cnx)
writer = pd.ExcelWriter('storage/report/consecutivo_pedido'+str(id)+'.xlsx', engine='xlsxwriter')
workbook = writer.book
##FORMATOS PARA EL TITULO---------------------------------------
rojo_g = workbook.add_format({
    'bold': 0,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    #'fg_color': 'yellow',
    'font_color': 'red',
    'font_size':16})
negro_s = workbook.add_format({
    'bold': 0,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':12})
negro_b = workbook.add_format({
    'bold': 2,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':13}) 
rojo_b = workbook.add_format({
    'bold': 2,
    'border': 0,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'red',
    'font_size':13})      

#FORMATOS PARA CABECERAS DE TABLA --------------------------------
header_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'center',
    'fg_color': 'yellow',
    'border': 1})

blue_header_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'border_color':'blue',
    'border': 1})

blue_hf = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'border_color':'blue',
    'font_color': 'blue',
    'border': 1})


#FORMATOS PARA TABLAS PER CE------------------------------------
tabla_normal = workbook.add_format({
    'border': 1,
    'align': 'center',
    'valign': 'vcenter',
    'font_color': 'black',
    'font_size':12})
    
tabla_prog = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'border': 1,
    'border_color':'blue',})
#FOOTER FORMATS---------------------------------------------------------
observaciones_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#BDD7EE',
    'border': 1})

total_cereza_format = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'border': 1})

#azul blanco------------------------------------------
b1no = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'font_size':12,
    'top': 1,
    'left': 1,
    'border_color': '#0094FF'})
    
b1n = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'font_size':13,
    'top': 1,
    'border_color': '#0094FF'})
    
b1ne = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'font_size':13,
     'top': 1,
    'right': 1,
    'border_color': '#0094FF'})
    
b1e = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'font_size':13,
    'right': 1,
    'border_color': '#0094FF'})
    
b1se = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'font_color':'#00D91A',
    'right': 1,
    'bottom': 1,
    'border_color': '#0094FF'})
    
b1s = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'bottom': 1,
    'border_color': '#0094FF'})
    
b1so = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'bottom': 1,
    'left': 1,
    'border_color': '#0094FF'})

b1o = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'left': 1,
    'border_color': '#0094FF'})

 #-------------------------------------------------
 # AZUL ROJO
 
b2n = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':13,
    'top': 1,
    'left': 1,
    'right': 1,
    'border_color': '#0094FF'})
    
b2c = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':12,
    'left': 1,
    'right': 1,
    'border_color': '#0094FF'})
    
b2s = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':13,
    'font_color':'#00D91A',
    'left': 1,
    'right': 1,
    'bottom':1,
    'border_color': '#0094FF'})
    
#---------------negro AMARILLO
b3n = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color': 'yellow',
    'font_size':13,
    'top': 1,
    'left': 1,
    'right': 1,})
    
b3c = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color': 'yellow',
    'font_size':12,
    'left': 1,
    'right': 1,})
    
b3s = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color': 'yellow',
    'font_size':13,
    'font_color':'#00D91A',
    'left': 1,
    'right': 1,
    'bottom':1,})
    
    #---------------NEGRO ROJO
totales_rojo= workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':13,
    })
    
totales_verde = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':13,
    'font_color':'green',
    })
    
b4s = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':12,
    'font_color':'#00D91A',
    'left': 1,
    'right':1,
    'bottom':1})

    
#dataframes

items.to_excel(writer, sheet_name='Sheet1', startrow=14,startcol=3, header=False, index=False)
worksheet = writer.sheets['Sheet1']
#worksheet.set_column(2,19,15)
# Encabezado.
worksheet.merge_range('G2:N2', 'TYRSA CONSORCIO S.A. DE C.V. ', rojo_g)
worksheet.merge_range('G3:N3', 'Soluciones en logistica interior', negro_s)
worksheet.merge_range('G4:N4', 'CONSECUTIVO DE PEDIDOS INTERNOS' ,negro_b)
worksheet.merge_range('G5:N5', 'Control de Cobros por P.I.', rojo_b)
worksheet.write('O4', "AÑO", negro_b)
worksheet.write('P4', "2022", negro_b)
worksheet.write('O6', "ACUMULADO", negro_s)
worksheet.write('O7', "$"+str(items["import"].sum()), totales_rojo)
worksheet.write('O8', "HASTA EL ULTIMO PEDIDO", negro_s)

worksheet.set_column(14, 14, 20)
worksheet.write('L10', "$0.0", totales_verde)
worksheet.write('M10', "$0.0", totales_verde)
worksheet.write('N10', "NA", totales_verde)
worksheet.write('O10', "$"+str(items["import"].sum()), totales_verde)

#Headers del dataframe
worksheet.set_column(3, 3, 20)
worksheet.merge_range('C12:C14', 'PDA \n NHO \n 2022', header_format)
worksheet.merge_range('D12:D14', 'FECHA DE EMISION  \n DD-MM-AA', header_format)
worksheet.merge_range('E12:E14', 'PEDIDO INTERNO NO.', header_format)

worksheet.merge_range('F12:G12', 'CLIENTE', header_format)
worksheet.merge_range('F13:F14', 'NUMERO', header_format)
worksheet.merge_range('G13:G14', 'NOMBRE CORTO', header_format)

worksheet.merge_range('H12:H14', 'CATEGORIA DEL EQUIPO', header_format)
worksheet.merge_range('I12:I14', 'DESCRIPCION BREVE', header_format)
worksheet.merge_range('J12:J14', 'UBICACION/SUCURSAL/TIENDA/PROYECTO', header_format)
worksheet.merge_range('K12:K14', 'TIPO DE MONEDA', header_format)

worksheet.merge_range('L12:O12', 'IMPORTE TOTAL SIN IVA', header_format)
worksheet.merge_range('L13:M13', 'MONEDA EXTRANJERA', header_format)
worksheet.write('L14', 'NOMBRE', header_format)
worksheet.write('M14', 'IMPORTE', header_format)
worksheet.merge_range('N13:N14', 'TIPO DE CAMBIO', header_format)
worksheet.merge_range('O13:O14', 'M.N. (EQUIVALENTE)', header_format)

worksheet.merge_range('P12:P14', 'ACUMULADO EN MONEDA NACIONAL (EQUIVALENTE)', header_format)
worksheet.merge_range('Q12:Q14', 'STATUS', header_format)

#columnas
for i in range(0,len(items)):
     worksheet.write(14+i, 2, i+1,tabla_normal)
     worksheet.write(14+i, 14, items["import"].values[i],tabla_normal)
     worksheet.write(14+i, 15, items["import"].values[i],tabla_normal)
     

worksheet.conditional_format(xlsxwriter.utility.xl_range(14, 2, 14+len(items), 6+len(items.columns)), {'type': 'no_errors', 'format': tabla_normal})





workbook.close()
import excel2img


excel2img.export_img('storage/report/consecutivo_pedido'+str(id)+'.xlsx','storage/report/consecutivo_pedido'+str(id)+'.png')
from PIL import Image
image_1 = Image.open('storage/report/consecutivo_pedido'+str(id)+'.png',)
im_1 = image_1.convert('RGB')
im_1.save('storage/report/consecutivo_pedido'+str(id)+'.pdf')


