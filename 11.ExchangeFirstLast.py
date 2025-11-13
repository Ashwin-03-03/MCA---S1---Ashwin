s = input("Enter a string: ")

if len(s) > 1:
    new_s = s[-1] + s[1:-1] + s[0] 
else:
    new_s = s

print("String after exchanging first and last characters:", new_s)
