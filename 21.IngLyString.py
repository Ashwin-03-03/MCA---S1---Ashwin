def add_ing_or_ly(word):
    if word.endswith("ing"):
        return word + "ly"
    else:
        return word + "ing"

# Example usage
user_input = input("Enter a word: ")
result = add_ing_or_ly(user_input)
print("Modified word:", result)
