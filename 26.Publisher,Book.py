class Publisher:
    def __init__(self, name):
        self.name = name
        print("Publisher constructor called")

    def display(self):
        print(f"Publisher Name: {self.name}")


class Book(Publisher):
    def __init__(self, name, title, author):
        super().__init__(name)
        self.title = title
        self.author = author
        print("Book constructor called")

    def display(self):
        super().display()
        print(f"Book Title: {self.title}")
        print(f"Author: {self.author}")


b = Book("Penguin Random House", "The Great Gatsby", "F. Scott Fitzgerald")
print("\nDisplaying details:\n")
b.display()
