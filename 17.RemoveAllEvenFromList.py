numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

result = []
for num in numbers:
    if num % 2 != 0: 
        result.append(num)

print("Original list:", numbers)
print("List after removing even numbers:", result)
