
package com.example.restservice.service;

import com.example.restservice.model.Address;
import com.example.restservice.model.Employee;
import java.util.ArrayList;
import java.util.List;

public class EmployeeService {

    static List<Employee> employees = new ArrayList<>();

    public List<Employee> getAllEmployees(){

        Employee employee1 = new Employee(1, "Tom","Reach",new Address(100,"saint-cross","h5n890"));
        Employee employee2 = new Employee(2, "Jerry","Bean",new Address(200,"bois","a40765"));
        Employee employee3 = new Employee(3, "Andy","Gates",new Address(300,"anny","j8e367"));



        employees.add(employee1);
        employees.add(employee2);
        employees.add(employee3);

        return employees;
    }

    public Employee getById(int id){
        for(Employee p : employees){
            if (p.getId() == id){
                return p;
            }
        }
        return null;
    }

    public void addEmployee(Employee employee){
        employees.add(employee);
    }
}
