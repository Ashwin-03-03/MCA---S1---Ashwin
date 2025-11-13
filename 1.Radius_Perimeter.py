
import math

r = float(input("Enter the radius of the circle: "))

perimeter = 2 * math.pi * r
area = math.pi * r * r      

print(f"Radius: {r}")
print(f"Perimeter (Circumference): {perimeter:.2f}")
print(f"Area: {area:.2f}")
