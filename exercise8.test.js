// script.test.js
const { rollDice } = require("./exercise8.js"); // Adjust path as needed

describe("rollDice", () => {
  it("should return a number between 1 and the number of sides", () => {
    const sides = 6;
    const result = rollDice(sides);
    expect(result).toBeGreaterThanOrEqual(1);
    expect(result).toBeLessThanOrEqual(sides);
  });

  it('should return "Invalid dice sides" if sides are less than or equal to 1', () => {
    expect(rollDice(0)).toBe("Invalid dice sides");
    expect(rollDice(1)).toBe("Invalid dice sides");
  });

  it("should return a number when a large number is passed", () => {
    const sides = 100;
    const result = rollDice(sides);
    expect(result).toBeGreaterThanOrEqual(1);
    expect(result).toBeLessThanOrEqual(sides);
  });
});
