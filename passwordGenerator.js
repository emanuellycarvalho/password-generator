
function generatePassword({
    length = 12, 
    includeUppercase = true, 
    includeLowercase = true, 
    includeNumbers = true, 
    includeSpecialChars = false
  } = {}) {
    
   const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const lowercase = 'abcdefghijklmnopqrstuvwxyz';
    const numbers = '0123456789';
    const specialChars = '!@#$%^&*()_+[]{}|;:,.<>?';
  
    let charset = '';
    if (includeUppercase) charset += uppercase;
    if (includeLowercase) charset += lowercase;
    if (includeNumbers) charset += numbers;
    if (includeSpecialChars) charset += specialChars;
  
    
   if (charset === '') {
      throw new Error('At least one character type must be selected');
    }
  
    
   let password = '';
    for (let i = 0; i < length; i++) {
      password += charset.charAt(Math.floor(Math.random() * charset.length));
    }
    
    return password;
  }
  
  module.exports = generatePassword;
  