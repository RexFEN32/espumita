import pandas as pd
report=pd.DataFrame()
report=report.append({"nfactura": 23,"moneda": "peso mexicano"},ignore_index=True)
report.to_excel("storage/report/reporte-factura_resumida.xlsx")