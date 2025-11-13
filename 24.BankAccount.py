# class BankAccount:
#     def __init__(self, owner="Karthika", balance=1000):
#         self.owner = owner
#         self.balance = balance
    
    
#     def deposit(self, amount):
#         if amount > 0:
#             self.balance += amount
#             print(f"Deposited ${amount}. New balance is ${self.balance}.")
#         else:
#             print("Deposit amount must be positive.")
    
#     def withdraw(self, amount):
#         if amount > self.balance:
#             print("Insufficient funds.")
#         elif amount <= 0:
#             print("Withdrawal amount must be positive.")
#         else:
#             self.balance -= amount
#             print(f"Withdrew ${amount}. New balance is ${self.balance}.")
    
#     def get_balance(self):
#         return f"${self.balance}"

# customer_name = input("Enter your name\n")
# balance = int(input("Enter your current balance\n"))
# customer = BankAccount(customer_name,balance)
# while 1:
#     num = int(input("Press '1' for Withdrawals, Press '2' for Deposit, Press '3' for Checking Balance, Press '4' to exit \n"))
#     match num:
#         case 1:
#             amount = int(input("Enter the amount to withdraw\n"))
#             customer.withdraw(amount)
#         case 2:
#             deposit_amount = int(input("Enter the amount to Deposit\n"))
#             customer.deposit(deposit_amount)
#         case 3:
#             print(customer.get_balance())
#         case 4:
#             print("Exiting...........")
#             break 
#         case _:
#             print("Enter a valid option\n")
        
        
        
        
class BankAccount:
    def __init__(self, owner, balance=0):
        self.owner = owner
        self.balance = balance
    
    def deposit(self, amount):
        if amount > 0:
            self.balance += amount
            print(f"Deposited ${amount}. New balance is ${self.balance}.")
        else:
            print("Deposit amount must be positive.")
    
    def withdraw(self, amount):
        if amount > self.balance:
            print("Insufficient funds.")
        elif amount <= 0:
            print("Withdrawal amount must be positive.")
        else:
            self.balance -= amount
            print(f"Withdrew ${amount}. New balance is ${self.balance}.")
    
    def get_balance(self):
        return self.balance

# Example usage:
account = BankAccount("Alice", 100)
account.deposit(50)
account.withdraw(30)
print(f"Final balance: ${account.get_balance()}")
