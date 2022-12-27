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
query = ('SELECT * from internal_orders')
pedidos=pd.read_sql(query,cnx)
nordenes=len(pedidos)

writer = pd.ExcelWriter('storage/report/consecutivo_factura'+str(id)+'.xlsx', engine='xlsxwriter')
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
b4n= workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':12,
    'top': 1,
    'left': 1,
    'right':1})
    
b4c = workbook.add_format({
    'bold': True,
    'text_wrap': True,
    'valign': 'top',
    'fg_color':'#F4B084',
    'font_size':13,
    'left': 1,
    'right':1})
    
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

pedidos.to_excel(writer, sheet_name='Sheet1', startrow=9,startcol=6, header=False, index=False)
worksheet = writer.sheets['Sheet1']
#worksheet.set_column(2,19,15)
# Encabezado.
worksheet.merge_range('G2:N2', 'TYRSA CONSORCIO S.A. DE C.V. ', rojo_g)
worksheet.merge_range('G3:N3', 'Soluciones en logistica interior', negro_s)
worksheet.merge_range('G4:N4', 'CONSECUTIVO DE PEDIDOS INTERNOS' ,negro_b)
worksheet.merge_range('G5:N5', 'Control de Cobros por P.I.', rojo_b)
worksheet.write(4, 20, "AÑO", negro_b)
worksheet.write(4, 19, "2022", negro_b)


#Dataframe yellow headers bitch xd
worksheet.merge_range('B6:B7', 'NOH', header_format)
worksheet.merge_range('C6:C7', 'FECHA D-M-A', header_format)
worksheet.merge_range('D6:D7', 'P.I. NO.', header_format)
worksheet.merge_range('E6:E7', 'NUMERO DE PAGO', header_format)
worksheet.merge_range('F6:F7', 'NUMERO TOTAL DE PAGOS', header_format)
worksheet.merge_range('G6:G7', 'FACTURA FOLIO NO.', header_format)
worksheet.merge_range('H6:H7', 'CLIENTE NO', header_format)
worksheet.merge_range('I6:I7', 'NOMBRE CORTO CLIENTE', header_format)
worksheet.merge_range('J6:J7', 'CATEGORIA EQUIPO', header_format)
worksheet.merge_range('K6:K7', 'DESCRIPCION BREVE', header_format)
worksheet.merge_range('L6:L7', 'UBI / SUC / TIENDA PROYECTO', header_format)
worksheet.merge_range('M6:M7', 'TIPO DE MOBEDA', header_format)
worksheet.merge_range('N6:N7', 'TIPO DE CAMBIO', header_format)


worksheet.merge_range('O6:P6', 'IMPORTE TOTAL SIN IVA', header_format)
worksheet.write(6, 14, "DLLS", header_format)
worksheet.write(6, 15, "M.N.(Equivalente)", header_format)
worksheet.merge_range('Q6:Q7', 'CAPTURO', header_format)
worksheet.merge_range('R6:R7', 'REVISO', header_format)
worksheet.merge_range('S6:S7', 'AUTORIZO', header_format)
worksheet.merge_range('T6:T7', 'STATUS', header_format)
#Dataframe yellow headers bitch xd
worksheet.merge_range('B6:B7', 'NOH', header_format)
worksheet.merge_range('C6:C7', 'FECHA D-M-A', header_format)
worksheet.merge_range('D6:D7', 'P.I. NO.', header_format)
worksheet.merge_range('E6:E7', 'NUMERO DE PAGO', header_format)
worksheet.merge_range('F6:F7', 'NUMERO TOTAL DE PAGOS', header_format)
worksheet.merge_range('G6:G7', 'FACTURA FOLIO NO.', header_format)
worksheet.merge_range('H6:H7', 'CLIENTE NO', header_format)
worksheet.merge_range('I6:I7', 'NOMBRE CORTO CLIENTE', header_format)
worksheet.merge_range('J6:J7', 'CATEGORIA EQUIPO', header_format)
worksheet.merge_range('K6:K7', 'DESCRIPCION BREVE', header_format)
worksheet.merge_range('L6:L7', 'UBI / SUC / TIENDA PROYECTO', header_format)
worksheet.merge_range('M6:M7', 'TIPO DE MOBEDA', header_format)
worksheet.merge_range('N6:N7', 'TIPO DE CAMBIO', header_format)

worksheet.merge_range('O6:P6', 'IMPORTE TOTAL SIN IVA', header_format)
worksheet.write(6, 14, "DLLS", header_format)
worksheet.write(6, 15, "M.N.(Equivalente)", header_format)

worksheet.merge_range('Q6:Q7', 'CAPTURO', header_format)
worksheet.merge_range('R6:R7', 'REVISO', header_format)
worksheet.merge_range('S6:S7', 'AUTORIZO', header_format)
worksheet.merge_range('T6:T7', 'STATUS', header_format)

workbook.close()
import excel2img
excel2img.export_img('storage/report/consecutivo_factura'+str(id)+'.xlsx','storage/report/consecutivo_pedido'+str(id)+'.png')
from PIL import Image
image_1 = Image.open('storage/report/consecutivo_factura'+str(id)+'.png',)
im_1 = image_1.convert('RGB')
im_1.save('storage/report/consecutivo_factura'+str(id)+'.pdf')


