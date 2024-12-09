

const generatePassword = require('../passwordGenerator');

test('should generate a password of specified length', () => {
  const password = generatePassword({ length: 10 });
  expect(password.length).toBe(10);
});

test('should generate a password with uppercase letters', () => {
  const password = generatePassword({ length: 12, includeUppercase: true });
  expect(/[A-Z]/.test(password)).toBe(true);  
});

test('should generate a password with lowercase letters', () => {
  const password = generatePassword({ length: 12, includeLowercase: true });
  expect(/[a-z]/.test(password)).toBe(true);  
});

test('should generate a password with numbers', () => {
  const password = generatePassword({ length: 12, includeNumbers: true });
  expect(/\d/.test(password)).toBe(true);  
});

test('should generate a password with special characters', () => {
  const password = generatePassword({ length: 12, includeSpecialChars: true });
  expect(/[^a-zA-Z0-9]/.test(password)).toBe(true);  
});

test('should throw an error if no character types are selected', () => {
  expect(() => generatePassword({ length: 12, includeUppercase: false, includeLowercase: false, includeNumbers: false, includeSpecialChars: false }))
    .toThrow('At least one character type must be selected');
});
