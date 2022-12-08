import pandas as pd
import pandas as pd
report=pd.DataFrame()
report=report.append({"nfactura": 23,"moneda": "peso mexicano"},ignore_index=True)
report.to_excel("public/storage/report/reporte-test2.xlsx")