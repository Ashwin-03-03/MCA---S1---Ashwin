class Time:
    def __init__(self, hours=0, minutes=0, seconds=0):
        # Private attributes
        self.__hours = hours
        self.__minutes = minutes
        self.__seconds = seconds
        self.__normalize_time()
    
    def __normalize_time(self):
        # Normalize the time to proper ranges (0-59 seconds, 0-59 minutes)
        if self.__seconds >= 60:
            self.__minutes += self.__seconds // 60
            self.__seconds = self.__seconds % 60
        if self.__minutes >= 60:
            self.__hours += self.__minutes // 60
            self.__minutes = self.__minutes % 60
        self.__hours = self.__hours % 24  # Wrap around 24 hours
    
    def __str__(self):
        return f"{self.__hours:02}:{self.__minutes:02}:{self.__seconds:02}"
    
    # Operator overloading for adding two Time objects
    def __add__(self, other):
        if isinstance(other, Time):
            new_hours = self.__hours + other.__hours
            new_minutes = self.__minutes + other.__minutes
            new_seconds = self.__seconds + other.__seconds
            return Time(new_hours, new_minutes, new_seconds)
        return NotImplemented
    
    # Example getter methods (optional, since attributes are private)
    def get_hours(self):
        return self.__hours
    
    def get_minutes(self):
        return self.__minutes
    
    def get_seconds(self):
        return self.__seconds

# Example usage:
t1 = Time(2, 45, 50)
t2 = Time(3, 20, 15)
t3 = t1 + t2  # Using overloaded +
print(t1)  # 02:45:50
print(t2)  # 03:20:15
print(t3)  # 06:06:05 (2:45:50 + 3:20:15 normalized)
