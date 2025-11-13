def char_frequency(text):
    freq = {}
    for char in text:
        if char in freq:
            freq[char] += 1
        else:
            freq[char] = 1
    return freq

# Input from user
string = input("Enter a string: ")
print("Character frequencies:", char_frequency(string))
