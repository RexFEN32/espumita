import pandas as pd
import sys
 
id=str(sys.argv[1])
# initialize list of lists
data = [['tom', 10], ['nick', 15], ['juli', 14]]
 
# Create the pandas DataFrame
df = pd.DataFrame(data, columns=['Name', 'Age'])
df.to_excel("storage/report/reporte-test"+id+".xlsx")