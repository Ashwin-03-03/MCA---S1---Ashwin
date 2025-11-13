my_dict = {"apple": 3, "banana": 1, "cherry": 2}

items = list(my_dict.items())

for i in range(len(items)):
    for j in range(i+1, len(items)):
        if items[i][1] > items[j][1]:
            items[i], items[j] = items[j], items[i]

asc_sorted = dict(items)
print("Ascending order:", asc_sorted)

desc_sorted = dict(reversed(items))
print("Descending order:", desc_sorted)
