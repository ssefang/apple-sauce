package com.example.restservice.api;

import com.example.restservice.model.Employee;
import com.example.restservice.service.EmployeeService;
import org.springframework.web.bind.annotation.*;
import java.util.List;

@RestController
public class EmployeeController {
    EmployeeService employeeService = new EmployeeService();
    //GET
    @GetMapping("/employee")
    public List<Employee> getAllEmployees(){
        return employeeService.getAllEmployees();
    }

    //I want to use the same route => (/pet) but I want to send an id to filter the data
    //PathVariable
    @GetMapping("/employee/{id}")
    public Employee getEmployeeById(@PathVariable int id){
        return employeeService.getById(id);
    }

    //POST
    @PostMapping("/employee")
    public Employee saveEmployee(@RequestBody Employee employee){
        employeeService.addEmployee(employee);
        return employee;
    }


}
