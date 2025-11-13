# Program to copy odd lines from one file to another

# Open the source file in read mode
with open("source.txt", "r") as src:
    # Read all lines from the file
    lines = src.readlines()

# Open the destination file in write mode
with open("odd_lines.txt", "w") as dest:
    # Loop through the lines with index
    for i in range(len(lines)):
        # Check if line number is odd (index starts from 0)
        if i % 2 == 0:  # 0-based index → line 1 is index 0
            dest.write(lines[i])

print("✅ Odd lines have been copied to 'odd_lines.txt'.")
