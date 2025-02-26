import sqlite3

conn = sqlite3.connect('photo.db')
cursor = conn.cursor()

cursor.execute('''
CREATE TABLE IF NOT EXISTS photos (
    ID TEXT PRIMARY KEY,
    Count INTEGER NOT NULL
)
''')

for i in range(1, 601):
    cursor.execute("INSERT INTO photos (ID, Count) VALUES (?, ?)", ('ID' + str(i), 0))

conn.commit()

cursor.execute("SELECT * FROM photos")
rows = cursor.fetchall()
for row in rows:
    print(row)

conn.close()