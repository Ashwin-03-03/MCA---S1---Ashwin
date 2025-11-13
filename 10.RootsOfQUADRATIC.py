import cmath  

a=int(input("Enter coefficient a: "))
b=int(input("Enter coefficient b: "))
c=int(input("Enter coefficient c: "))

d = cmath.sqrt(b**2 - 4*a*c)  

root1 = (-b + d) / (2*a)
root2 = (-b - d) / (2*a)

print(f"Roots of the quadratic equation: {root1}, {root2}")