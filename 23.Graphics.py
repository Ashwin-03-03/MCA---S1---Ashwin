import turtle

def draw_triangle(rows):
    t = turtle.Turtle()
    t.speed(1)
    t.penup()

    start_x = 0
    start_y = 100

    for i in range(rows):
        # Calculate number of dots in this row
        dots = 2 * i + 1
        # Calculate starting x position to center the dots
        x = start_x - dots * 10 / 2
        y = start_y - i * 20

        for j in range(dots):
            t.goto(x + j * 10, y)
            t.dot(10, "black")  # Draw a dot with diameter 10
    turtle.done()

draw_triangle(5)
